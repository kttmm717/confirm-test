<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>
<body>
    <header class='header'>
        <div class="header__inner">
            <div class="header__logo">FashionablyLate</div>
        </div>
    </header>
    <main>
        <div class="contact">
            <div class="contact__inner">
                <h2 class="contact-title">Contact</h2>

                <form class="contact-form" action="/confirm" method="post">
                    @csrf
                    <table class="contact-table">
                        <tr class="contact-table__row">
                            <th class="contact-table__header">
                                <div class="name-item">
                                    <p>お名前<span class="span">※</span></p>
                                    @error('first_name')
                                    <p class="error">{{$message}}</p>
                                    @enderror  
                                    @error('last_name')
                                    <p class="error">{{$message}}</p>
                                    @enderror                
                                </div>
                            </th>
                            <td class="contact-table__date">
                                <div class="input-name">
                                    <input type="text" name='first_name' placeholder="例: 山田" value="{{old('first_name')}}">
                                    <input type="text" name='last_name' placeholder="例: 太郎" value="{{old('last_name')}}">
                                </div>
                            </td>
                        </tr>

                        <tr class="contact-table__row">
                            <th class="contact-table__header">
                                <div class="gender-item">
                                    <p>性別<span class="span">※</span></p>
                                    @error('gender')
                                    <p class="error">{{$message}}</p>
                                    @enderror
                                </div>
                            </th>
                            <td class="contact-table__date">
                                <div class="input-gender">
                                    <input type="radio" name='gender' value="0" checked {{old('gender') == 0 ? 'checked':''}}>男性
                                    <input type="radio" name='gender' value="1" {{old('gender') == 1 ? 'checked':''}}>女性
                                    <input type="radio" name='gender' value="2" {{old('gender') == 2 ? 'checked':''}}>その他
                                </div>
                            </td>
                        </tr>

                        <tr class="contact-table__row">
                            <th class="contact-table__header">
                                <div class="email-item">
                                    <p>メールアドレス<span class="span">※</span></p>
                                    @error('email')
                                    <p class="error">{{$message}}</p>
                                    @enderror
                                </div>
                            </th>
                            <td class="contact-table__date">
                                <input class="input-email" type="text" name='email' placeholder="例: test@example" value="{{old('email')}}">
                            </td>
                        </tr>

                        <tr class="contact-table__row">
                            <th class="contact-table__header">
                                <div class="tel-item">
                                    <p>電話番号<span class="span">※</span></p>
                                    <p class="error-tel">@errorany('tel1, tel2, tel3')</p>
                                </div>
                            </th>
                            <td class="contact-table__date">
                                <div class="tel-input">
                                    <input type="text" name='tel1' placeholder="080" value="{{old('tel1')}}"> -
                                    <input type="text" name='tel2' placeholder="1234" value="{{old('tel2')}}"> -
                                    <input type="text" name='tel3' placeholder="5678" value="{{old('tel3')}}">
                                </div>
                            </td>
                        </tr>

                        <tr class="contact-table__row">
                            <th class="contact-table__header">
                                <div class="address-item">
                                    <p>住所<span class="span">※</span></p>
                                    @error('address')
                                    <p class="error">{{$message}}</p>
                                    @enderror
                                </div>
                            </th>
                            <td class="contact-table__date">
                                <input class="address-input" type="text" name='address' placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" value="{{old('address')}}">
                            </td>
                        </tr>

                        <tr class="contact-table__row">
                            <th class="contact-table__header">建物名</th>
                            <td class="contact-table__date">
                                <input class="building-input" type="text" name='building' placeholder="例: 千駄ヶ谷マンション100" value="{{old('building')}}">
                            </td>
                        </tr>

                        <tr class="contact-table__row">
                            <th class="contact-table__header">
                                <div class="category-item">
                                    <p>お問い合わせの種類<span class="span">※</span></p>
                                    @error('category_id')
                                    <p class="error">{{$message}}</p>
                                    @enderror
                                </div>
                            </th>
                            <td class="contact-table__date">
                                <select class="category-select" name="category_id">
                                    <option value="">選択してください</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category['id']}}" {{old('category_id') == $category['id'] ? 'selected':''}}>{{$category['content']}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>

                        <tr class="contact-table__row">
                            <th class="contact-table__header detail">
                                <div class="datail-item">
                                    <p>お問い合わせ内容<span class="span">※</span></p>
                                    @error('detail')
                                    <p class="error">{{$message}}</p>
                                    @enderror
                                </div>
                            </th>
                            <td class="contact-table__date">
                                <textarea class="detail-textarea" name="detail" placeholder="お問い合わせ内容をご記入ください">{{old('detail')}}</textarea>
                            </td>
                        </tr>
                    </table>
                    <div class="confirm-btn">
                        <button>確認画面</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>