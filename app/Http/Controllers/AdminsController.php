<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Repositories\AdminsRepository;
use Carbon\Carbon;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Hash;

class AdminsController extends Controller
{
    /**
     * 驗證管理者登入資料
     */
    public function AdminLogin(Request $request)
    {
        // 請求參數
        $account = $request->input('account', '');
        $password = $request->input('password', '');

        // 查詢帳號資料
        $info = AdminsRepository::GetByAccount($account);

        // 檢查是否有資料
        if (is_null($info)){
            return '帳號錯誤或不存在';
        }

        // 檢查密碼是否正確
        if (Hash::check($password, $info->password)) {
            redirect('/');
        } else {
            return '密碼錯誤';
        }
    }

    /**
     * 管理員選擇要開啟的日期、新增日期
     */
    public function ChooseDate(Request $request){
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
        //將date陣列回傳到view/指定頁面
        return view('/', compact('AllDate'));
    }

    }


?>