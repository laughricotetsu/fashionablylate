@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')
<div class="admin-container">
    <header class="admin-header">
        <h1 class="site-title">FashionablyLate</h1>
        <a href="/logout" class="logout-btn">logout</a>
    </header>

    <main class="admin-main">
        <h2 class="page-title">Admin</h2>


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
                    <td>
                        <button 
                            class="detail-btn" 
                            data-name="{{ $contact->last_name }} {{ $contact->first_name }}"
                            data-gender="@if($contact->gender == 1) 男性 @elseif($contact->gender == 2) 女性 @else その他 @endif"
                            data-email="{{ $contact->email }}"
                            data-category="{{ $contact->category->content }}"
                            data-detail="{{ $contact->detail }}"
                            data-address="{{ $contact->address }}"
                            data-tel="{{ $contact->tel }}"
                        >
                            詳細
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{-- モーダル --}}
        <div id="detailModal" class="modal">
            <div class="modal-content">
                <span class="close-btn">&times;</span>
                <h3>お問い合わせ詳細</h3>
                <p><strong>お名前：</strong> <span id="modalName"></span></p>
                <p><strong>性別：</strong> <span id="modalGender"></span></p>
                <p><strong>メールアドレス：</strong> <span id="modalEmail"></span></p>
                <p><strong>住所：</strong> <span id="modalAddress"></span></p>
                <p><strong>電話番号：</strong> <span id="modalTel"></span></p>
                <p><strong>お問い合わせの種類：</strong> <span id="modalCategory"></span></p>
                <p><strong>お問い合わせ内容：</strong></p>
                <p id="modalDetail" class="modal-text"></p>
            </div>
        </div>
    </main>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const modal = document.getElementById("detailModal");
    const closeBtn = document.querySelector(".close-btn");

    // 詳細ボタンクリックでモーダルを開く
    document.querySelectorAll(".detail-btn").forEach(button => {
        button.addEventListener("click", function() {
            document.getElementById("modalName").textContent = this.dataset.name;
            document.getElementById("modalGender").textContent = this.dataset.gender;
            document.getElementById("modalEmail").textContent = this.dataset.email;
            document.getElementById("modalAddress").textContent = this.dataset.address;
            document.getElementById("modalTel").textContent = this.dataset.tel;
            document.getElementById("modalCategory").textContent = this.dataset.category;
            document.getElementById("modalDetail").textContent = this.dataset.detail;

            modal.style.display = "flex";
        });
    });

    // 閉じるボタン
    closeBtn.addEventListener("click", () => {
        modal.style.display = "none";
    });

    // モーダル外クリックで閉じる
    window.addEventListener("click", (e) => {
        if (e.target === modal) {
            modal.style.display = "none";
        }
    });
});
</script>
@endsection
