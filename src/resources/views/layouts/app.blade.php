<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>@yield('title', 'FashionablyLate')</title>

    {{-- 共通CSS --}}
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
</head>

<body>
    <header class=""header>
        <div class="header__inner">
            <a class="header__logo" href="/">
                FashionablyLate
            </a>
        </div>
    </header>

    <main>
        @yield('content')
    </main>
</body>


    {{-- メインコンテンツ --}}
    <main class="main-content">
        @yield('content')
    </main>

    {{-- 共通スクリプト --}}
    @yield('scripts')
</body>
</html>
