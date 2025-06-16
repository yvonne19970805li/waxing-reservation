<?php

namespace App\Repositories;

use App\Models\ReservationDates;
use Illuminate\Support\Collection;
use Carbon\Carbon;


class ReservationDatesRepository
{
    // 新增修改日期(Admin)
    public static function EditDate($params)
    {
        foreach ($params as $date) {
            ReservationDates::firstOrCreate(
                ['date' => $date],
            );
        };
    }

    //刪除日期(Admin)
    public static function DeleteDate($params)
    {
        foreach ($params as $date) {
            ReservationDates::where('date', $date)->delete();
        }
    }

    //查詢可預約日期(ALL)
    public static function SearchDate($params)
    {
        //取出月份頭尾
        //startofmonth會連同時間一起顯示 、 toDateString取僅日期去掉時間
        $start = Carbon::createFromFormat('Y-m', $params)
        ->startOfMonth()
        ->toDateString();

        $end = Carbon::createFromFormat('Y-m' , $params)
        ->endOfMonth()
        ->toDateString();

        //查詢範圍
        $date = ReservationDates::select('date')
        ->whereBetween('date' , [$start , $end])
        ->orderBy('date')
        ->get()
        ->toArray();

        return $date;

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
