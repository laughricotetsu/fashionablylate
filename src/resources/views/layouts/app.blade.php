<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'FashionablyLate')</title>

    {{-- 共通CSS --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    {{-- ページごとの追加CSS --}}
    @stack('styles')

    </header>

    {{-- メインコンテンツ --}}
    <main class="main-content">
        @yield('content')
    </main>

    {{-- 共通スクリプト --}}
    @yield('scripts')
</body>
</html>
