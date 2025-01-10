<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
use Illuminate\Support\Facades\Response;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view('index', compact('categories'));
    }

    public function confirm(ContactRequest $request) {
        $contact = $request->only(['first_name', 'last_name', 'gender', 'email', 'tel1', 'tel2', 'tel3', 'address', 'building', 'category_id', 'detail']);
        $category = Category::find($request->category_id);
        $name = $request['first_name'].'  '.$request['last_name'];
        $tel = $request['tel1'].$request['tel2'].$request['tel3'];
        return view('confirm', compact('name', 'tel', 'contact', 'category'));
    }

    public function thanks(Request $request) {
        if($request->input('back') == 'back') {
            return redirect('/')->withInput();
        }
        $contact = $request->only(['first_name', 'last_name', 'gender', 'email', 'tel',  'address', 'building', 'category_id', 'detail']);
        Contact::create($contact);
        return view('thanks');
    }

    public function search(Request $request) {
        $contacts = Contact::with('category')->keywordSearch($request->keyword)->genderSearch($request->gender)->categorySearch($request->category)->dateSeach($request->date)->paginate(7);
        $categories = Category::all();
        return view('admin', compact('contacts', 'categories'));
    }

    public function delete(Request $request) {
        Contact::find($request->id)->delete();
        return redirect('/admin');
    }

    public function export(Request $request) {
        $keyword = $request->input('keyword');
        $gender = $request->input('gender');
        $category = $request->input('category');
        $date = $request->input('date');
        $contacts = Contact::with('category')->keywordSearch($keyword)->genderSearch($gender)->categorySearch($category)->dateSeach($date)->get();
        return $this->exportCSV($contacts);
    }

    public function exportCSV($contacts) {        
        // CSVデータを作成
        $csvDate = [];
        $csvDate[] = ['名前', '性別', 'メールアドレス', 'お問い合わせの種類'];//ヘッダー

        foreach($contacts as $contact) {
            $csvDate[] = [
                $contact->name,
                $contact->gender_text,
                $contact->email,
                $contact->category->content
            ];
        }

        //CSVファイルを作成
        $filename = 'contacts_' . now()->format('Ymd_His') . 'csv';
        $handle = fopen('php://temp' , 'r+');
        foreach($csvDate as $row) {
            fputcsv($handle, $row);
        }
        rewind($handle);
        $content = stream_get_contents($handle);
        fclose($handle);

        //ダウンロード用レスポンスを返す
        return Response::make($content, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=$filename"
        ]);
    }
}
