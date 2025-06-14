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
        //取得整個陣列
        $GetDates = $request->all;

        //將資料全部列出+傳入資料表儲存
        foreach ($GetDates as $date) {
            ReservationDatesRepository::SaveDate($date);
        };
}
}

?>