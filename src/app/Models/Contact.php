<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'first_name',
        'last_name',
        'gender',
        'email',
        'tel',
        'address',
        'building',
        'detail'
    ];
    // 紐づけ
    public function category() {
        return $this->belongsTo(Category::class);
    }
    // genderカラムの定数配列
    public const gender_options = [
        0 => '男性',
        1 => '女性',
        2 => 'その他'
    ];
    //nameアクセサ
    protected function getNameAttribute() {
        return $this->first_name . '  ' . $this->last_name;
    }
    //genderアクセサ
    public function getGenderTextAttribute() {
        if($this->gender === 0) {
            return '男性';
        } elseif($this->gender === 1) {
            return '女性';
        } else {
            return 'その他';
        }
    }
    // ローカルスコープ
    public function scopeKeywordSearch($query, $keyword) {
        if(!empty($keyword)) {
            $query->where('first_name', 'like', '%'.$keyword.'%')
                  ->orwhere('last_name', 'like', '%'.$keyword.'%')
                  ->orwhere('email', 'like', '%'.$keyword.'%');
        }
    }
    public function scopeGenderSearch($query, $gender) {
        if(is_numeric($gender)) {
            $query->where('gender', (int)$gender);
        }
    }
    public function scopeCategorySearch($query, $category) {
        if(!empty($category)) {
            $query->where('category_id', $category);
        }
    }
    public function scopeDateSeach($query, $date) {
        if(!empty($date)) {
            $query->where('created_at', 'like', '%'.$date.'%');
        }
    }
}
