<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ReservationDatesRepository;

class ReservationDatesController extends Controller
{
    
    /**
     * 接收日期資料，儲存選擇的日期至資料表
     */
    public function SaveDate(Request $request){
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