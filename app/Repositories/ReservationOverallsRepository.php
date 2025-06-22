<?php

namespace App\Repositories;

use App\Models\ReservationOveralls;
use App\Models\ReservationTimes;
use App\Models\ReservationDates;


class ReservationOverallsRepository
{
    //新增單日可預約日+時段
    public static function AddReservationChoose($dateId, array $timesId)
    {
        foreach ($timesId as $times) {
            ReservationOveralls::create(['date_id' => $dateId, 'time_id' => $times]);
        }
    }

    //尋找date對應的開放time
    public static function SearchTimeById($params)
    {
        $times = ReservationOveralls::join('reservation_times', 'reservation_overalls.time_id', '=', 'reservation_times.id')
        ->where('reservation_overalls.date_id', $params)
        ->where('reservation_overalls.status' , true)
        ->select('reservation_times.id as time_id', 'reservation_times.time')
        ->get();
        return $times;
    }

    //尋找date_id對應date
    public static function SearchDateById($params){
        $dates = ReservationDates::select('date')
        ->where('id' , $params)
        ->get();
        return $dates;
    }
}
