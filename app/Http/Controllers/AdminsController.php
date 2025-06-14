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
        //檢查帳號是否存在  可以怎麼把它縮短嗎？
        $account = $request->input('account', '');
        $accountCheck = AdminsRepository::AccountCheck($account);
        if(is_null($accountCheck)){
            return '帳號錯誤或不存在';
        }

        //如果帳號存在則繼續檢查密碼
        $password = $request->input('password', '');
        $hashpassword = AdminsRepository::Login($account);
        if (Hash::check($password, $hashpassword)) {
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