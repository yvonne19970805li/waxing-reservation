<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Repositories\LineAuthRepository;


class LineAuthController extends Controller
{
    /**
     * 1. 轉向 LINE 登入
     * public function redirectToLine() 
     */
    public function redirectToLine()
    {
        return Socialite::driver('line')->redirect();
    }

    /**
     * 2.登入後回調line處理
     */
    public function returnLineCallback()
    {
        $lineUser = Socialite::driver('line')->user();

        //1.查詢該用戶是否註冊過
        $parmas = LineAuthRepository::Search($lineUser);
        
        /**
         * 2.將查詢的結果丟回來
         * 如果上面為null則觸發以下if,否則表示有註冊過跳掉下個登入
         */
        if (!$parmas) {
            LineAuthRepository::Cre($lineUser);
        }

        /**
         * 3.登入到指定api位置
         */
        return redirect()->route('dashboard');

    }
}
