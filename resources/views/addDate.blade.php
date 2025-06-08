<div class="container">
    <h2>請選擇要開放預約的日期</h2>

    <form action="{{ url('/add/date/store') }}" method="POST">
        @csrf

        <div style="display: flex; flex-wrap: wrap;">
            <div style="width: 150px; margin: 10px;">
                <select>
                    @foreach ($AllDate as $date)
                    <option name="dates" value="{{ $date }}">
                        {{ $date }}
                    </option>
                    @endforeach
                </select>

                <select>
                    <option name="times" selected >請選擇時段</option>
                    <option name="times" value="10:30">10:30</option>
                    <option name="times" value="13:00">13:00</option>
                    <option name="times" value="15:30">15:30</option>
                    <option name="times" value="17:30">17:30</option>
                    <option name="times" value="18:30">18:30</option>
                    <option name="times" value="20:30">20:30</option>
                    <option name="times" value="20:30後">20:30後</option>
                </select>
            </div>
        </div>

        <button type="submit">儲存選擇的日期</button>
    </form>
</div>