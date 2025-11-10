@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
<body>
    <div class="confirm-container">
        <h1>Confirm</h1>

        <table class="confirm-table">
            <tr>
                <th>お名前</th>
                <td>{{ $inputs['last_name'] }} {{ $inputs['first_name'] }}</td>
            </tr>
            <tr>
                <th>性別</th>
                <td>
                    @if($inputs['gender'] == 1)
                        男性
                    @elseif($inputs['gender'] == 2)
                        女性
                    @else
                        その他
                    @endif
                </td>
            </tr>
            <tr>
                <th>メールアドレス</th>
                <td>{{ $inputs['email'] }}</td>
            </tr>
            <tr>
                <th>電話番号</th>
                <td>{{ $inputs['tel_first'] }}-{{ $inputs['tel_second'] }}-{{ $inputs['tel_third'] }}</td>
            </tr>
            <tr>
                <th>住所</th>
                <td>{{ $inputs['address'] }}</td>
            </tr>
            <tr>
                <th>建物名</th>
                <td>{{ $inputs['building'] }}</td>
            </tr>
            <tr>
                <th>お問い合わせの種類</th>
                <td>{{ \App\Models\Category::find($inputs['category_id'])->content ?? '' }}</td>
            </tr>
            <tr>
                <th>お問い合わせ内容</th>
                <td>{{ $inputs['detail'] }}</td>
            </tr>
        </table>

        {{-- フォーム --}}
        <form method="POST" action="{{ route('contacts.store') }}">
            @csrf
            @foreach ($inputs as $key => $value)
                @if (is_array($value))
                    @foreach ($value as $val)
                        <input type="hidden" name="{{ $key }}[]" value="{{ $val }}">
                    @endforeach
                @else
                    <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                @endif
            @endforeach

            <div class="buttons">
                <button type="button" onclick="window.location.href='{{ route('contacts.index') }}'">修正</button>

                <button type="submit" name="action" value="submit">送信</button>
            </div>
        </form>
    </div>
</body>
</html>
