<?php

namespace App\Http\Controllers;

use App\Models\ReservationOveralls;
use Illuminate\Http\Request;
use App\Repositories\ReservationOverallsRepository;

class ReservationOverallsController extends Controller
{
    /**
     * 查詢可預約整月+時段總覽
     * 
     */
    public function SearchOverall(Request $request)
    {
        //取得搜尋月份
        $month = $request->input('month');
    }


    //那這邊還要做以日期吐時段資料的出來controller嗎？

    /**
     * Admin:新增單日時段組合
     */
    public function Add(Request $request)
    {
        //取得參數日期id、時段id
        $dateId = $request->input('dateId');
        $timesId = $request->input('timesId', []);
        ReservationOverallsRepository::AddReservationChoose($dateId, $timesId);
        return response()->json(['message' => '新增成功']);
    }

    /**
     * 查詢指定時段的結果
     */
    public function Search(Request $request)
    {
        $date_id = $request->input('date_id');
     
        //取得要搜尋的日期(帶入date_id)   
        $collection = ReservationOverallsRepository::SearchTimeById($date_id);
        $resultTime = $collection->pluck('time');

        //尋找date_id對應的日期
        $resultDate = ReservationOverallsRepository::SearchDateById($date_id);

        return response()->json(['date_id' => $resultDate, 'times' => $resultTime]);
    }

    /**
     * Admin:關閉單日時段
     * 先查詢再關閉
     * status為1預設=開放(true) 、0=關閉(false)
     */
    public function Close(Request $request)
    {
        $date_id = $request->input('date_id');
        $resultTime = ReservationOverallsRepository::closeTimeById($date_id);
        return response()->json(["message'=>'$resultTime'.'該時段已關閉'])
    }
}
