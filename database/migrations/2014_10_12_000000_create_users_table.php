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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('user_email', 50)->unique();
            $table->string('password', 100);
            $table->string('user_nama', 100);
            $table->text('user_alamat')->nullable();
            $table->string('user_hp', 25);
            $table->string('user_pos', 5);
            $table->tinyInteger('user_role')->default(2);
            $table->tinyInteger('user_aktif')->default(1);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
