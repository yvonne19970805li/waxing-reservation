<!--選擇好月份後按下按鈕傳送到addDate選擇日期-->

<div>
    <!-- resources/views/admin/appointmentDateSelect.blade.php -->
<form action="{{ url('/add/date') }}" method="GET">
    <label for="month">選擇月份：</label>
    <input type="month" name="month" id="month" value="{{ date('Y-m') }}" required>

    <button type="submit">產生該月預約日期</button>
</form>

</div>
