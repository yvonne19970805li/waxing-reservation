<?php

namespace App\Repositories;

use App\Models\Members;

class MembersRepository
{
    /**
     * 1+2.檢查取得的lineid是否有存在資料表內，
     * 使用first()如果有則回傳第一個符合值，若沒有則會回傳null(空值)
     * 意指是否有註冊過
     */
    static function Search($lineUser)
    {
        return Members::where('line_id', $lineUser->id)->first();
    }
    
    /**
     * 新增會員資料
     */
    static function Create($lineUser)
    {
        Members::create([
            'line_id' => $lineUser->id,
            'line_name' => $lineUser->name,
            'email' => $lineUser->email,
        ]);
    }

    /**
     * 編輯會員資料
     */
    static function Edit($parmas){
        Members::save($parmas);
    }
}

?>