<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 會員
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('line_id')->comment('登入id')->unique();
            $table->string('line_name', 50)->comment('line名稱');
            $table->string('name', 50)->comment('本名')->default(''); 
            $table->string('email')->comment('信箱')->default('');
            $table->string('phone')->comment('電話')->default('');
            $table->integer('sex')->comment('性別')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
