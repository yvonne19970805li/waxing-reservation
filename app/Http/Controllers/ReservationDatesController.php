<?php

namespace App\Http\Controllers;

use App\Models\ReservationDates;
use Illuminate\Http\Request;
use App\Repositories\ReservationDatesRepository;

class ReservationDatesController extends Controller
{
    /**
     * 修改/新稱可預約日
     * 一次新增多筆
     */
    public function Create(Request $request){
        // 取得參數
        $dates = $request->input('dates', []);
        // 新增資料
        ReservationDatesRepository::EditDate($dates);
        return response()->json(['message' => '成功新增']);
    }

    /**
     * 刪除可預約日
     * 使用軟刪除
     */
    public function Delete(Request $request){
        //取得參數
        $dates = $request->input('dates' , []);

        //刪除所選日期
        ReservationDatesRepository::DeleteDate($dates);
        return response() -> json(['message' => '成功刪除']);
    }

    /**
     * 搜尋可預約日
     * @month = Y-m
     */
    public function Search(Request $request){
        $month = $request->input('month' , '');

        $date = ReservationDatesRepository::SearchDate($month);
        return response() -> json(['array' => $date]);

    }
}

?>