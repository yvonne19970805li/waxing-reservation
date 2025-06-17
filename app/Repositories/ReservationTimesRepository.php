<?php

namespace App\Repositories;

use App\Models\ReservationTimes;
use Psy\TabCompletion\Matcher\FunctionsMatcher;

class ReservationTimesRepository
{

    /**
     * 檢查時段重複
     */
    public static function CheckTime($params)
    {
        return ReservationTimes::select('time')->where('time', $params)->first();
    }

    /**
     * 手動新增時段
     */
    public static function EditTime($params)
    {
        foreach ($params as $time) {
            ReservationTimes::create(['time' => $time]);
        };
    }

    /**
     * 儲存開放時段
     */
    public static function SaveTime($params)
    {
        ReservationTimes::select('time')
        ->where('time', $params)
        ->update(['status' => true]);
    }

    /**
     * 搜尋開放時段
     */
    public static function SearchTime(){
        $AllTime = ReservationTimes::select('time')
        ->where('status' , true)
        ->get();

        return $AllTime;
    }


}
