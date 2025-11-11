@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection

@section('content')

<body>
    <header class="header">
        <h1 class="site-title">FashionablyLate</h1>
        <a href="/login" class="header-link">login</a>
    </header>

    <main class="main">
        <h2 class="page-title">Register</h2>
        <div class="form-container">
            <form action="/register" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">お名前</label>
                    <input type="text" name="name" id="name" placeholder="例: 山田 太郎" value="{{ old('name') }}">
                    @error('name')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>

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

                <button type="submit" class="submit-btn">登録</button>
            </form>
        </div>
    </main>
</body>
</html>
