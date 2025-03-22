<?

namespace App\Repositories;

use App\Models\Line_id;

class LineAuthRepository
{
    /**
     * 1.檢查取得的lineid是否有存在資料表內，
     * 使用first()如果有則回傳第一個符合值，若沒有則會回傳null(空值)
     * 意指是否有註冊過
     */
    static function Search($lineUser)
    {
        return Line_id::where('line_id', $lineUser->getId())->first();
    }
    
    /**
     * 2.如果觸發以下,否則表示沒註冊過
     * 則建立一筆資料
     */
    static function Cre($lineUser)
    {
        Line_id::create([
                'line_id' => $lineUser->getID(),
                'email' => $lineUser->getEmail(),
                'name' => $lineUser->getName()
            ]);
    }
}

?>