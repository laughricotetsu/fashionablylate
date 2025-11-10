@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">

<div class="login-page">
    <a href="/register" class="register-button">register</a>

    <h2 class="site-title">Login</h2>


    <div class="login-box">
        <form method="POST" action="/login" method="post">
            @csrf

            {{-- メールアドレス --}}
            <div class="form-group">
                <label for="email">メールアドレス</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="例：test@example.com">
                @error('email')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            {{-- パスワード --}}
            <div class="form-group">
                <label for="password">パスワード</label>
                <input type="password" id="password" name="password" placeholder="例：coachtech06">
                @error('password')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            {{-- ログインボタン --}}
            <div class="form-group text-center">
                <button type="submit" class="login-button-main">ログイン</button>
            </div>
        </form>
    </div>
</div>
@endsection
