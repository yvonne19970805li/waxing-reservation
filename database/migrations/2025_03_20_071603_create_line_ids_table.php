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
            $table->string('line_id')->comment('登入id')->unique()->default('');
            $table->string('line_name',50)->comment('line名稱')->default('');
            $table->string('name',50)->comment('本名')->default(''); 
            $table->string('phone')->comment('電話')->default('');
            $table->string('sexual')->comment('性別')->default('');
            $table->string('email')->comment('信箱')->default('');
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
