<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Repositories\MembersRepository;

class MemberController extends Controller
{
    /**
     * 1.轉向 LINE 登入
     * public function redirectToLine() 
     */
    public function Login()
    {
        return Socialite::driver('line')->redirect();
    }

    /**
     * 2.登入後回調line處理
     */
    public function LineCallback()
    {
        // 1.獲得登入者資訊
        $lineUser = Socialite::driver('line')->user();
        if (is_null($lineUser->email)) {
            $lineUser->email = '';
        }

        // 存入 session 供後續 signUp 使用
        session(['line_id' => $lineUser->id]);

        // 2.查詢該用戶是否註冊過
        $parmas = MembersRepository::Search($lineUser);

        // 3.將查詢的結果丟回來
        // 如果上面為null則觸發以下if,否則表示有註冊過跳掉下個登入
        if (!$parmas) {
            MembersRepository::Create($lineUser);
            return redirect('/edit');
        }else return redirect('/');

        // 登入到指定’網頁‘（位置導向填寫個人資料補充
    }

    /**
     * 編輯會員資料
     */
    public function Edit(Request $request){
        $line_id = session('line_id');
        $name = $request->input('name','');
        $phone = $request->input('phone','');
        $sex = $request->input('sex','');
        $parmas = array('line_id' => $line_id, 'name' => $name, 'phone'=>$phone , 'sex'=>$sex);
        MembersRepository::Edit($parmas);
    }
}
