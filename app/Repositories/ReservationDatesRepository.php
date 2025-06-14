<?php

namespace App\Repositories;

use App\Models\ReservationDates;
use Illuminate\Support\Collection;

class ReservationDatesRepository{
    // 查詢資料 (依照Id)
    public static function GetById($id): ?ReservationDates {
        return ReservationDates::where('id' , $id)->first();
    }

    // 查詢資料 (依照日期)
    public static function GetByDate($date): Collection {
        return ReservationDates::where('date' , $date)->get();
    }

    // 新增
    public static function Create($date) {
        ReservationDates::create($date);
    }

    // 新增 (可多筆)
    public static function Creates($dates) {
        ReservationDates::insert($dates);
    }
}
?>