@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')
<div class="admin-container">
    <header class="admin-header">
        <h1 class="site-title">FashionablyLate</h1>
        <!-- <a href="/logout" class="logout-btn">logout</a> -->
        <form action="/logout" method="post">
            <input type="submit" value="logout">
        </form>
    </header>

    <main class="admin-main">
        <h2 class="page-title">Admin</h2>

        {{-- 検索フォーム --}}
        <form action="{{ route('admin.search') }}" method="GET" class="search-form">
            <input type="text" name="keyword" placeholder="名前やメールアドレスを入力してください">
            <select name="gender">
                <option value="">性別</option>
                <option value="1">男性</option>
                <option value="2">女性</option>
                <option value="3">その他</option>
            </select>
            <select name="category_id">
                <option value="">お問い合わせの種類</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->content }}</option>
                @endforeach
            </select>
            <input type="date" name="date">
            <button type="submit" class="btn search-btn">検索</button>
            <a href="{{ route('admin.index') }}" class="btn reset-btn">リセット</a>
        </form>

        {{-- エクスポートボタン --}}
        <div class="export-area">
            <button class="btn export-btn">エクスポート</button>
        </div>

        {{-- テーブル --}}
        <table class="contact-table">
            <thead>
                <tr>
                    <th>お名前</th>
                    <th>性別</th>
                    <th>メールアドレス</th>
                    <th>お問い合わせの種類</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                <tr>
                    <td>{{ $contact->last_name }} {{ $contact->first_name }}</td>
                    <td>
                        @if($contact->gender == 1) 男性
                        @elseif($contact->gender == 2) 女性
                        @else その他
                        @endif
                    </td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->category->content }}</td>
                    <td><a href="{{ route('admin.detail', $contact->id) }}" class="detail-btn">詳細</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{-- ページネーション --}}
        <div class="pagination">
            {{ $contacts->links('vendor.pagination.default') }}
        </div>
    </main>
</div>
@endsection
