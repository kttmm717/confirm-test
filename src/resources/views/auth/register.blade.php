<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>
<body>
    <header class='header'>
        <div class="header__inner">
            <div></div>
            <div class="header__logo">FashionablyLate</div>
            <div class="header__link"><a href="/login">login</a></div>
        </div>
    </header>

    <main>
        <div class="register">
            <div class="register__inner">
                <h2 class="register_title">register</h2>
                <form class="register-form" action="/register" method="post">
                    @csrf
                    <div class="register-form__inner">
                        <div class="register-form__item">
                            <p class="register-form__item--ttl">お名前</p>
                            <input type="text" name='name' placeholder="例:山田　太郎">
                            @error('name')
                                <p class="error">
                                    {{$message}}
                                </p>
                            @enderror
                        </div>
                        <div class="register-form__item">
                            <p class="register-form__item--ttl">メールアドレス</p>
                            <input type="email" name='email' placeholder="例:test@example.com">
                            @error('email')
                                <p class="error">
                                    {{$message}}
                                </p>
                            @enderror
                        </div>
                        <div class="register-form__item">
                            <p class="register-form__item--ttl">パスワード</p>
                            <input type="password" name='password' placeholder="例:coachtech1106">                       
                            @error('password')
                                <p class="error">
                                    {{$message}}
                                </p>
                            @enderror                       
                        </div>
                        <div class="register-form__button">
                            <button>登録</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>