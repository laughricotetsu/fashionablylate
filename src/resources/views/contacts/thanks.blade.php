<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お問い合わせ完了</title>
    <link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
</head>
<body>
    <div class="thanks-container">
        <h1>Thank you</h1>
        <p>お問い合わせありがとうございました</p>
        <a href="{{ route('contacts.index') }}" class="back-button">HOME</a>
    </div>
</body>
</html>
