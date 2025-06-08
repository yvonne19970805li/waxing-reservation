<?php

namespace App\Repositories;

use App\Models\Line_id;

class LineAuthRepository
{
    /**
     * 1+2.檢查取得的lineid是否有存在資料表內，
     * 使用first()如果有則回傳第一個符合值，若沒有則會回傳null(空值)
     * 意指是否有註冊過
     */
    static function Search($lineUser)
    {
        return Line_id::where('line_id', $lineUser->id)->first();
    }
    
    /**
     * 3.如果觸發以下,否則表示沒註冊過
     * 則建立一筆資料
     */
    static function Create($lineUser)
    {
        Line_id::create([
                'line_id' => $lineUser->id,
                'email' => $lineUser->email,
                'line_name' => $lineUser->name
            ]);
    }

    /**
     * 4.寫入新註冊資料
     */
    static function signUp($parmas){
        Line_id::where('line_id' , $parmas['line_id'])->update($parmas);
    }

    /**
     * 5.編輯個人資料
     */
    static function EditPersonal($parmas){
        Line_id::save($parmas);
    }
}

?>