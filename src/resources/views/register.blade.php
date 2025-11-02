@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">

<div class="register-page">
    <a href="{{ route('login') }}" class="login-button">login</a>

    <h1 class="site-title">FashionablyLate</h1>
    <p class="register-title">Register</p>

    <div class="register-box">
        <form method="POST" action="{{ route('register.store') }}">
            @csrf

            {{-- 名前 --}}
            <div class="form-group">
                <label for="name">お名前</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="例：山田 太郎">
                @error('name')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            {{-- メール --}}
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

            {{-- 登録ボタン --}}
            <div class="form-group text-center">
                <button type="submit" class="register-button">登録</button>
            </div>
        </form>
    </div>
</div>
@endsection
