<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <title>預約完成</title>
</head>
<body>
    <h1>預約完成！</h1>

    @if (session('success'))
        <p style="color:pink ;">{{ session('success') }}</p>
    @endif

    @if (session('datas'))
        @php
            $datas = session('datas');
        @endphp
        <ul>
            <li><strong>預約日期：</strong> {{ $datas['appointmentDate'] }}</li>
            <li><strong>預約時段：</strong> {{ $datas['appointmentTime'] }}</li>
            <li><strong>除毛部位：</strong> {{ $datas['areaPart'] }}</li>
        </ul>
    @else
        <p>查無預約資料。</p>
    @endif
</body>
</html>
