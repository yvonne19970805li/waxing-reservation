<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ReservationDatesRepository;

class ReservationDatesController extends Controller
{
    
    /**
     * 新增預約日期
     * 可一次新增多筆
     */
    public function Creates(Request $request){
        // 取得參數
        $dates = $request->input('dates', []);
        // 整理資料到陣列
        $params = [];
        foreach ($dates as $date) {
            array_push($params, ['date' => $date]);
        };
        // 沒資料就不新增
        if (count($params) == 0) {
            return;
        }
        // 新增資料
        ReservationDatesRepository::Creates($params);
}
}

?>