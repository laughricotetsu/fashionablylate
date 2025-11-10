@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">

<div class="register-container">
    <a href="/login" class="login-button">login</a>

    <h1>register</h1>

    <div class="register-box">
   <form action="/register" method="POST">
    @csrf
    <div>
        <label>お名前</label>
        <input type="text" name="name" value="{{ old('name') }}" placeholder="例: 山田 太郎">
        @error('name')
            <div class="error">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label>メールアドレス</label>
        <input type="email" name="email" value="{{ old('email') }}" placeholder="例: test@example.com">
        @error('email')
            <div class="error">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label>パスワード</label>
        <input type="password" name="password" placeholder="例: coachtechno6">
        @error('password')
            <div class="error">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="submit-btn">登録</button>
</form>

    </div>
</div>
@endsection
