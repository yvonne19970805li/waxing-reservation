<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ReservationDatesRepository;
use Carbon\Carbon;

class ReservationDatesController extends Controller
{
    /**
     * 管理員選擇要開啟的日期、新增日期 這邊都不用了
     * public function ChooseDate(Request $request){
        //回傳指定月份全部天數
        $month = $request->input('month','');
        $start = Carbon::createFromFormat('Y-m',$month)->startOfMonth();
        $end = Carbon::createFromFormat('Y-m', $month)->endOfMonth();
        //為保護$start不會再算是過程變動所以複製一個副本
        $currnet = $start->copy();
        //使用迴圈跑出該月所有日期，並存成日期、陣列格式
        $AllDate = [];
        while ($currnet->lte($end)) {
            $AllDate[] = $currnet->format('m-d');
            $currnet->addDay();
        }
    }
     */
     

    /**
     * 新增預約日期
     * 可一次新增多筆
     */
    public function Creates(Request $request){
        // 取得參數
        $dates = $request->input('dates', []);
        // 新增資料
        ReservationDatesRepository::EditDate($dates);
        return response()->json(['message' => '成功']);
    }
}

?>