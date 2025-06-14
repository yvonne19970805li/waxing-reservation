<?php

namespace App\Repositories;

use App\Models\ReservationDates;

class ReservationDatesRepository{
    //將日期存到資料表內
    static function SaveDate($date){
        ReservationDates::create(['date' => $date]);
    }
}
?>