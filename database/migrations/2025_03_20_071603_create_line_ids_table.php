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
        Schema::create('line_ids', function (Blueprint $table) {
            $table->id();
            $table->string('name',10)->comment('名稱')->nullable();
            $table->string('email')->comment('信箱');
            $table->string('password','')->comment('密碼');
            $table->string('line_id')->comment('登入id')->unique()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('line_ids');
    }
};
