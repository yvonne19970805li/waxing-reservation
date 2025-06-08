<?php

namespace Database\Seeders;

use App\Models\Admins;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 預設管理員資料
        Admins::updateOrCreate(
            ['account' => 'Dev'],
            [
            'password' => Hash::make('123456'),
            'name' => '開發用帳號',
            'status' => 1,
        ]);
    }
}
