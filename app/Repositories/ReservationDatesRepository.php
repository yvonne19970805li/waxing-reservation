<?php

namespace App\Repositories;

use App\Models\ReservationDates;
use Illuminate\Support\Collection;

class ReservationDatesRepository
{
    // 新增修改日期(Admin)
    public static function EditDate($params)
    {
        foreach ($params as $date) {
            ReservationDates::firstOrCreate(
                ['date' => $date],
                ['date' => $date],
            );
        };
    }

     // 查詢資料 (依照Id)
    //public static function GetById($id): ?ReservationDates {
    //    return ReservationDates::where('id' , $id)->first();
    //}

    // 查詢資料 (依照日期)
    //public static function GetByDate($date): Collection {
    //    return ReservationDates::where('date' , $date)->get();
    //}
}
