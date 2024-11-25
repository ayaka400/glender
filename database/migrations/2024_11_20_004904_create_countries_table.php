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
        Schema::create('countries', function (Blueprint $table) {
            $table->id(); // 主キー
            $table->unsignedBigInteger('user_id'); // 外部キー（usersテーブルを参照）
            $table->string('country_name'); // 国名
            $table->text('description')->nullable()->comment('国の概要'); // 概要
            $table->text('greeting')->nullable(); // 挨拶
            $table->longText('flag_image')->nullable(); // 国旗画像 (Base64形式で保存)
            $table->timestamps(); // created_at と updated_at

            // 外部キー制約（ユーザーが削除されたらそのユーザが登録した国も削除）
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
