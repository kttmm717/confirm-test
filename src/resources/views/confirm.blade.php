<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
</head>
<body>
    <header class='header'>
        <div class="header__inner">
            <div class="header__logo">FashionablyLate</div>
        </div>
    </header>
    <main>
        <div class="confirm">
            <div class="confirm__inner">
                <h2 class="confirm-title">Confirm</h2>
                <form action="/thanks" method="post">
                    @csrf
                    <table class="confirm-table">
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">お名前</th>
                            <td class="confirm-date">
                                <input type="hidden" name='first_name' value="{{$contact['first_name']}}">
                                <input type="hidden" name='last_name' value="{{$contact['last_name']}}">
                                {{$name}}
                            </td>
                        </tr>

                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">性別</th>
                            <td class="confirm-date">
                                <input type="hidden" name='gender' value="{{$contact['gender']}}">
                                @if($contact['gender'] === 0)
                                男性
                                @elseif($contact['gender'] === 1)
                                女性
                                @else
                                その他
                                @endif
                            </td>
                        </tr>

                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">メールアドレス</th>
                            <td class="confirm-date">
                                <input type="hidden" name='email' value="{{$contact['email']}}">
                                {{$contact['email']}}
                            </td>
                        </tr>

                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">電話番号</th>
                            <td class="confirm-date">
                                <input type="hidden" name='tel1' value="{{$contact['tel1']}}">
                                <input type="hidden" name='tel2' value="{{$contact['tel2']}}">
                                <input type="hidden" name='tel3' value="{{$contact['tel2']}}">
                                {{$tel}}
                            </td>
                        </tr>

                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">住所</th>
                            <td class="confirm-date">
                                <input type="hidden" name='address' value="{{$contact['address']}}">
                                {{$contact['address']}}
                            </td>
                        </tr>

                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">建物名</th>
                            <td class="confirm-date">
                                <input type="hidden" name='building' value="{{$contact['building']}}">
                                {{$contact['building']}}
                            </td>
                        </tr>

                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">お問い合わせの種類</th>
                            <td class="confirm-date">
                                <input type="hidden" name='category_id' value="{{$contact['category_id']}}">
                                {{ $category['content'] }}                   
                            </td>
                        </tr>

                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">お問い合わせ内容</th>
                            <td class="confirm-date">
                                <input type="hidden" name='detail' value="{{$contact['detail']}}">
                                {{$contact['detail']}}
                            </td>
                        </tr>
                    </table>
                    <div class="btn">
                        <button class="confirm-btn">送信</button>
                        <button class="correction-btn" type="submit" name="back" value="back">修正</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>