@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">預約表單</h2>

    <form method="POST" action="{{ url('/reservation/store') }}">

        {{-- 預約日期 --}}
        <div class="mb-3">
            <label for="appointmentdate" class="form-label">預約日期</label>
            <select name="appointmentdate" id="appointmentdate" class="form-select" required>
                <option value="">請選擇日期</option>
                @foreach ($appointmentDates as $date)
                    <option value="{{ $date->id }}">{{ $date->date }}</option>
                @endforeach
            </select>
        </div>

        {{-- 預約時段 --}}
        <div class="mb-3">
            <label for="appointmenttime" class="form-label">預約時段</label>
            <select name="appointmenttime" id="appointmenttime" class="form-select" required>
                <option value="">請選擇時段</option>
                @foreach ($appointmentTimes as $time)
                    <option value="{{ $time->id }}">{{ $time->time }}</option>
                @endforeach
            </select>
        </div>

        {{-- 除毛部位（多選） --}}
        <div class="mb-3">
            <label class="form-label">除毛部位（可多選）</label><br>
            @foreach ($areaParts as $part)
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="area_parts[]" value="{{ $part->id }}" id="part{{ $part->id }}">
                    <label class="form-check-label" for="part{{ $part->id }}">{{ $part->part }} ({{ $part->price }} 元)</label>
                </div>
            @endforeach
        </div>

        {{-- 提交按鈕 --}}
        <button type="submit" class="btn btn-primary">確認預約</button>
    </form>
</div>
@endsection
