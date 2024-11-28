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
        Schema::create('events', function (Blueprint $table) {
            $table->id(); // 主キー
            $table->unsignedBigInteger('user_id'); // ユーザーの外部キー
            $table->unsignedBigInteger('country_id'); // 国の外部キー
            $table->string('event_image')->nullable(); // イベント画像
            $table->date('start_date'); // 開始日
            $table->date('end_date')->nullable(); // 終了日（nullable）
            $table->text('description')->nullable()->comment('イベントの概要'); // イベントの概要
            $table->text('greeting')->nullable(); // 挨拶文
            $table->timestamps(); // 作成日と更新日

            // 外部キー制約
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade'); // ユーザーが削除されたらそのユーザが登録したイベントも削除
            $table->foreign('country_id')
                ->references('id')->on('countries')
                ->onDelete('cascade'); // 国が削除されたらイベントも削除
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
