<?php

namespace App\Http\Controllers;

use App\Models\ReservationTimes;
use Illuminate\Http\Request;
use App\Repositories\ReservationTimesRepository;

class ReservationTimesController extends Controller
{
    /**
     * 手動新增預約時間單項(Admin)
     */
    public function Add(Request $request){
        //取得參數(字串)
        $time = $request->input('time');
        //判斷時段是否已存在，否則新增至資料表
       $check = ReservationTimesRepository::CheckTime($time);
        if ($check){
        return response()->json(['message' => '該時段已存在']) ;
        } else {
        ReservationTimesRepository::EditTime($time);
        return response() -> json(['message' => '新增成功']);}
    }

    /**
     * 儲存開放預約時間(Admin)
     * status為1預設=開放(true) 、0=關閉(false)
     */
    public function Save(Request $request){
        //取得要儲存的時間
        $openTime = $request->input('time' , []);
        //儲存成開放
        ReservationTimesRepository::SaveTime($openTime);
        return response() -> json(['message' => '時段已開放']);
    }

    /**
     * 搜尋開放時段
     */
    public function Search(){
        $AllTime = ReservationTimesRepository::SearchTime();
        return response() -> json(['array' => $AllTime]);
    }

}
