@extends('layouts.app')

@section('title', 'Contact')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endpush

@section('content')
<div class="contact-container">
    <h2 class="page-title">Contact</h2>

     @if ($errors->any())
     <div class="error-messages">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
     </div>
     @endif

    <form action="{{ url('/confirm') }}" method="POST" class="contact-form">
        @csrf

        {{-- お名前 --}}
        <div class="form-group name-group">
            <label>お名前 <span class="required">※</span></label>
            <div class="name-inputs">
                <input type="text" name="last_name" value="{{ old('last_name') }}" placeholder="例: 山田">
                <input type="text" name="first_name" value="{{ old('first_name') }}" placeholder="例: 太郎">
            </div>
            @error('last_name')<p class="error">{{ $message }}</p>@enderror
            @error('first_name')<p class="error">{{ $message }}</p>@enderror
        </div>

        {{-- 性別 --}}
        <div class="form-group">
            <label>性別 <span class="required">※</span></label>
            <div class="gender-inputs">
                <label><input type="radio" name="gender" value="1" {{ old('gender', '1') == '1' ? 'checked' : '' }}> 男性</label>
                <label><input type="radio" name="gender" value="2" {{ old('gender') == '2' ? 'checked' : '' }}> 女性</label>
                <label><input type="radio" name="gender" value="3" {{ old('gender') == '3' ? 'checked' : '' }}> その他</label>
            </div>
            @error('gender')<p class="error">{{ $message }}</p>@enderror
        </div>

        {{-- メールアドレス --}}
        <div class="form-group">
            <label>メールアドレス <span class="required">※</span></label>
            <input type="email" name="email" value="{{ old('email') }}" placeholder="例: test@example.com">
            @error('email')<p class="error">{{ $message }}</p>@enderror
        </div>

        {{-- 電話番号 --}}
        <div class="form-group">
            <label>電話番号 <span class="required">※</span></label>
            <div class="tel-inputs">
                <input type="text" name="tel_first" maxlength="5" value="{{ old('tel_first') }}" placeholder="例: 080">
                <span>-</span>
                <input type="text" name="tel_second" maxlength="5" value="{{ old('tel_second') }}" placeholder="1234">
                <span>-</span>
                <input type="text" name="tel_third" maxlength="5" value="{{ old('tel_third') }}" placeholder="5678">
            </div>
            @error('tel_first')<p class="error">{{ $message }}</p>@enderror
            @error('tel_second')<p class="error">{{ $message }}</p>@enderror
            @error('tel_third')<p class="error">{{ $message }}</p>@enderror
        </div>

        {{-- 住所 --}}
        <div class="form-group">
            <label>住所 <span class="required">※</span></label>
            <input type="text" name="address" value="{{ old('address') }}" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3">
            @error('address')<p class="error">{{ $message }}</p>@enderror
        </div>

        {{-- 建物名 --}}
        <div class="form-group">
            <label>建物名</label>
            <input type="text" name="building" value="{{ old('building') }}" placeholder="例: 千駄ヶ谷マンション101">
        </div>

        {{-- お問い合わせの種類 --}}
    <div class="form-group">
    <label for="category_id">お問い合わせの種類 <span class="required">※</span></label>
    <select name="category_id" id="category_id" required>
        <option value="">選択してください</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                {{ $category->content }}
            </option>
        @endforeach
    </select>
    @error('category_id')<p class="error">{{ $message }}</p>@enderror
    </div>

        {{-- お問い合わせ内容 --}}
        <div class="form-group">
            <label>お問い合わせ内容 <span class="required">※</span></label>
            <textarea name="detail" rows="5" placeholder="お問い合せ内容をご記載ください">{{ old('detail') }}</textarea>
            @error('detail')<p class="error">{{ $message }}</p>@enderror
        </div>

        {{-- 確認画面へ --}}
        <div class="form-button">
            <button type="submit" class="confirm-btn">確認画面</button>
        </div>
    </form>
</div>
@endsection
