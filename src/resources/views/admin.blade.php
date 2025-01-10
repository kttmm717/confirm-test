<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
    <header class='header'>
        <div class="header__inner">
            <div></div>
            <div class="header__logo">FashionablyLate</div>
            <form class="header__link" action="/logout" method="post">
                @csrf             
                <button>logout</button>
            </form>
        </div>
    </header>
    <main>
        <div class="admin">
            <div class="admin__inner">
                <h2 class="addmin-title">Admin</h2>

                <form class="search-form" action="/search" method="get">
                    <div class="search-form__item keyword">
                        <input type="text" name='keyword' placeholder="名前やメールアドレスを入力してください">
                    </div>
                    <div class="search-form__item gender">
                        <select name="gender" >
                            <option value="">性別</option>
                            <option value="">全て</option>
                            @foreach(App\Models\Contact::gender_options as $value => $lavel)
                            <option value="{{$value}}">{{$lavel}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="search-form__item category">
                        <select name="category">
                            <option value="">お問い合わせの種類</option>
                            @foreach($categories as $category)
                            <option value="{{ $category['id'] }}">{{ $category['content'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="search-form__item date">
                        <input type="date" name='date' placeholder="年/月/日">
                    </div>
                    <div class="search-form__item search">
                        <button>検索</button>
                    </div>
                    <div class="search-form__item reset">
                        <a href="/admin">リセット</a>
                    </div>
                </form>

                <div class="middle-row">
                    <form class="export-form" action='/export' method="get">
                        @csrf
                        <input type="hidden" name='keyword' value="{{request('keyword')}}">
                        <input type="hidden" name='gender' value="{{request('gender')}}">
                        <input type="hidden" name='category' value="{{request('category')}}">
                        <input type="hidden" name='date' value="{{request('date')}}">
                        <button>エクスポート</button>
                    </form>
                    <div class="paginate">
                        {{$contacts->appends(request()->query())->links('pagination::semantic-ui')}}
                    </div>
                </div>

                <table class="admin-table">
                    <tr class="admin-table__row">
                        <th class="admin-table__header">お名前</th>
                        <th class="admin-table__header">性別</th>
                        <th class="admin-table__header">メールアドレス</th>
                        <th class="admin-table__header">お問い合わせの種類</th>
                        <th class="admin-table__header"></th>
                    </tr>
                    @foreach($contacts as $index => $contact)
                    <tr class="admin-table__row">
                        <td class="admin-table__date">{{$contact['name']}}</td>
                        <td class="admin-table__date">
                            @if($contact['gender'] == 0)
                                男性
                            @elseif($contact['gender'] == 1)
                                女性
                            @else
                                その他
                            @endif
                        </td>
                        <td class="admin-table__date">{{$contact['email']}}</td>
                        <td class="admin-table__date">{{$contact['category']['content']}}</td>
                        <td class="admin-table__date">
                            <button class="open" data-modal="modal-{{$index}}">
                                詳細
                            </button>
                            <div class="modal" id="modal-{{$index}}">
                                <div class="close">×</div>
                                <div class="modal__inner">
                                    <table class="modal-table">
                                        <tr class="modal-table__row">
                                            <th class="modal-table__header">お名前</th>
                                            <td class="modal-table__date">{{$contact['name']}}</td>
                                        </tr>
                                        <tr class="modal-table__row">
                                            <th class="modal-table__header">性別</th>
                                            <td class="modal-table__date">
                                            @if($contact['gender'] == 0)
                                                男性
                                            @elseif($contact['gender'] == 1)
                                                女性
                                            @else
                                                その他
                                            @endif
                                            </td>
                                        </tr>
                                        <tr class="modal-table__row">
                                            <th class="modal-table__header">メールアドレス</th>
                                            <td class="modal-table__date">{{$contact['email']}}</td>
                                        </tr>
                                        <tr class="modal-table__row">
                                            <th class="modal-table__header">電話番号</th>
                                            <td class="modal-table__date">{{$contact['tel']}}</td>
                                        </tr>
                                        <tr class="modal-table__row">
                                            <th class="modal-table__header">住所</th>
                                            <td class="modal-table__date">{{$contact['address']}}</td>
                                        </tr>
                                        <tr class="modal-table__row">
                                            <th class="modal-table__header">建物名</th>
                                            <td class="modal-table__date">{{$contact['building']}}</td>
                                        </tr>
                                        <tr class="modal-table__row">
                                            <th class="modal-table__header">お問い合わせの種類</th>
                                            <td class="modal-table__date">{{$contact['category']['content']}}</td>
                                        </tr>
                                        <tr class="modal-table__row">
                                            <th class="modal-table__header">お問い合わせ内容</th>
                                            <td class="modal-table__date">{{$contact['detail']}}</td>
                                        </tr>
                                    </table>
                                    <form class="delete-form" action='/delete' method="post">
                                        @csrf
                                        @method('delete')
                                        <input type="hidden" name='id' value="{{$contact['id']}}">
                                        <button>削除</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </main>
    <script src="{{asset('js/script.js')}}"></script>
</body>
</html>