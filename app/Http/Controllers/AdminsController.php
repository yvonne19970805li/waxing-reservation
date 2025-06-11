<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Repositories\AdminsRepository;
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
}




?>