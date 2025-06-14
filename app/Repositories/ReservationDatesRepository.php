<?php

namespace App\Repositories;

use App\Models\ReservationDates;

class ReservationDatesRepository{
    // 新增
    public static function Create($payload){
        ReservationDates::create($payload);
    }

    // 新增 (可多筆)
    public static function Creates($payload){
        ReservationDates::insert($payload);
    }
}
?>