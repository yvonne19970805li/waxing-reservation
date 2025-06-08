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
        // 管理員
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('account', 20)->unique();
            $table->string('password', 20);
            $table->string('name', 20);
            $table->integer('status')->comment('狀態')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
