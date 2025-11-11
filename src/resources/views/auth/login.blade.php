<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>
    <header class="header">
        <h1 class="site-title">FashionablyLate</h1>
        <a href="/register" class="header-link">register</a>
    </header>

    <main class="main">
        <h2 class="page-title">Login</h2>

        <div class="form-container">
            <form action="/login" method="POST">
                @csrf

                <div class="form-group">
                    <label for="email">メールアドレス</label>
                    <input type="email" name="email" id="email" placeholder="例: test@example.com" value="{{ old('email') }}">
                    @error('email')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">パスワード</label>
                    <input type="password" name="password" id="password" placeholder="例: coachtechno6">
                    @error('password')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>
