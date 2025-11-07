@extends('layouts.app')

@section('title', 'お問い合わせ管理画面')

@section('content')
<div class="admin-container">
    <h1>お問い合わせ管理</h1>

    {{-- 🔍 検索フォーム --}}
    <form action="{{ route('admin.index') }}" method="GET" class="search-form">
        <div class="form-row">
            <input type="text" name="keyword" value="{{ request('keyword') }}" placeholder="名前・メールアドレスで検索">
            
            <select name="gender">
                <option value="全て" {{ request('gender') == '全て' ? 'selected' : '' }}>全て</option>
                <option value="1" {{ request('gender') == '1' ? 'selected' : '' }}>男性</option>
                <option value="2" {{ request('gender') == '2' ? 'selected' : '' }}>女性</option>
                <option value="3" {{ request('gender') == '3' ? 'selected' : '' }}>その他</option>
            </select>

            <select name="category_id">
                <option value="">全ての種類</option>
                @foreach(App\Models\Category::all() as $category)
                    <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->content }}
                    </option>
                @endforeach
            </select>

            <input type="date" name="date" value="{{ request('date') }}">
        </div>

        <div class="form-row">
            <button type="submit" class="btn search-btn">検索</button>
            <a href="{{ route('admin.index') }}" class="btn reset-btn">リセット</a>
            <a href="{{ route('contacts.export', request()->query()) }}" class="btn export-btn">CSVエクスポート</a>
        </div>
    </form>

    {{-- 📋 一覧テーブル --}}
    <table class="contact-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>お名前</th>
                <th>性別</th>
                <th>メールアドレス</th>
                <th>お問い合わせ種類</th>
                <th>登録日</th>
                <th>詳細</th>
                <th>削除</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contacts as $contact)
                <tr>
                    <td>{{ $contact->id }}</td>
                    <td>{{ $contact->last_name }} {{ $contact->first_name }}</td>
                    <td>
                        @if($contact->gender == 1) 男性
                        @elseif($contact->gender == 2) 女性
                        @else その他
                        @endif
                    </td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->category->content ?? '' }}</td>
                    <td>{{ $contact->created_at->format('Y/m/d') }}</td>
                    <td>
                        <button type="button" class="btn detail-btn" data-id="{{ $contact->id }}">詳細</button>
                    </td>
                    <td>
                        <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" onsubmit="return confirm('削除してよろしいですか？')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn delete-btn">削除</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- 📄 ページネーション --}}
    <div class="pagination">
        {{ $contacts->links('pagination::bootstrap-5') }}
    </div>
</div>

{{-- 詳細モーダル --}}
<div id="detailModal" class="modal hidden">
    <div class="modal-content">
        <span class="close-btn">&times;</span>
        <h2>お問い合わせ詳細</h2>
        <div id="modal-body"></div>
    </div>
</div>

@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('detailModal');
    const closeBtn = document.querySelector('.close-btn');
    const modalBody = document.getElementById('modal-body');

    // 詳細ボタンがクリックされたらAJAXでデータ取得
    document.querySelectorAll('.detail-btn').forEach(button => {
        button.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            fetch(`/contacts/${id}`)
                .then(res => res.json())
                .then(data => {
                    modalBody.innerHTML = `
                        <p><strong>お名前:</strong> ${data.last_name} ${data.first_name}</p>
                        <p><strong>性別:</strong> ${data.gender == 1 ? '男性' : data.gender == 2 ? '女性' : 'その他'}</p>
                        <p><strong>メール:</strong> ${data.email}</p>
                        <p><strong>電話番号:</strong> ${data.tel}</p>
                        <p><strong>住所:</strong> ${data.address}</p>
                        <p><strong>建物名:</strong> ${data.building ?? ''}</p>
                        <p><strong>お問い合わせ内容:</strong> ${data.detail}</p>
                        <p><strong>登録日:</strong> ${data.created_at}</p>
                    `;
                    modal.classList.remove('hidden');
                });
        });
    });

    // モーダルを閉じる
    closeBtn.addEventListener('click', () => modal.classList.add('hidden'));
    modal.addEventListener('click', e => {
        if (e.target === modal) modal.classList.add('hidden');
    });
});
</script>
@endsection
