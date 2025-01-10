<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <header class='header'>
        <div class="header__inner">
            <div></div>
            <div class="header__logo">FashionablyLate</div>
            <div class="header__link"><a href="/register">register</a></div>
        </div>
    </header>

    <main>
        <div class="login">
            <div class="login__inner">
                <h2 class="login_title">Login</h2>
                <form class="login-form" action="/login" method="post">
                    @csrf
                    <div class="login-form__inner">
                        <div class="login-form__item">
                            <p class="login-form__item--ttl">メールアドレス</p>
                            <input type="email" name='email' placeholder="例:test@example.com">
                            @error('email')
                                <p class="error">
                                    {{$message}}
                                </p>
                            @enderror
                            </div>
                        <div class="login-form__item">
                            <p class="login-form__item--ttl">パスワード</p>
                            <input type="password" name='password' placeholder="例:coachtech1106">                       
                            @error('password')
                                <p class="error">
                                    {{$message}}
                                </p>
                            @enderror                       
                        </div>
                        <div class="login-form__button">
                            <button>ログイン</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>