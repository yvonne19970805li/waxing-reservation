<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\AdminsRepository;
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
        if (is_null($info)) {
            return response()->json([
                'error' => '查無使用者或帳號錯誤'
            ], 404);
        }
        // 檢查密碼是否正確
        if (Hash::check($password, $info->password)) {
            return response()->json(['result' => $info]);
        } else {
            return response()->json(['error' => '密碼錯誤'], 404);
        }
    }
}
