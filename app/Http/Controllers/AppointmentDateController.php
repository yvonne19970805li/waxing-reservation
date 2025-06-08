<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Repositories\AppointmentDateRepository;
use Carbon\Carbon;

class AppointmentDateController extends Controller
{
    /**
     * 預約日期＋時間
     */

    //顯示日期
    public function showDate(Request $request)
    {
        $month = $request->input('month');

        //得到該月的首日＆尾日
        $start = Carbon::createFromFormat('Y-m', $month);
        $start = $start->startOfMonth();

        $end = Carbon::createFromFormat('Y-m', $month);
        $end = $end->endOfMonth();

        //為保護$start不會再算是過程變動所以複製一個副本
        $current = $start->copy();
        //使用迴圈跑出該月所有日期，並存成日期、陣列格式
        $AllDate = [];

        while ($current->lte($end)) {
            $AllDate[] = $current->format('m-d');
            $current->addDay();
        }
        //將date陣列回傳到view/addDate
        return view('addDate', compact('AllDate'));
    }}