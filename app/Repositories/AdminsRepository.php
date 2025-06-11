<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Hash;


use App\Models\Admins;

class AdminsRepository
{
    //檢查帳號是否存在
    static function AccountCheck($account){
        return Admins::where('account' , $account)->first();
    }

    //抓出對應帳號的密碼回傳
    static function Login($account)
    {
        Admins::where('account', $account)
            ->value('password');
    }
}
?>