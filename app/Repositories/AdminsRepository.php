<?php

namespace App\Repositories;

use App\Models\Admins;

class AdminsRepository
{
    // 查詢資料 (依照帳號)
    public static function GetByAccount($account): ?Admins {
        return Admins::where('account' , $account)->first();
    }
}
?>