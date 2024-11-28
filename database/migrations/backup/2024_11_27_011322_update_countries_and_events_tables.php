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
        // countries テーブルの変更
        Schema::table('countries', function (Blueprint $table) {
            $table->string('capital')->nullable()->comment('首都')->after('country_name'); // 首都
            $table->string('lang')->nullable()->comment('言語')->after('capital'); // 言語
            $table->string('relig')->nullable()->comment('宗教')->after('lang'); // 宗教
            $table->string('tourist_spot')->nullable()->comment('有名な観光地')->after('relig'); // 観光地
            $table->dropColumn('description'); // description を削除
            $table->text('other_desc')->nullable()->comment('その他の概要')->after('tourist_spot'); // その他の概要
        });

        // events テーブルの変更
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn('country_name'); // country_name を削除
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // // countries テーブルの変更を元に戻す
        Schema::table('countries', function (Blueprint $table) {
            $table->dropColumn('capital');
            $table->dropColumn('lang');
            $table->dropColumn('relig');
            $table->dropColumn('tourist_spot');
            $table->string('description')->after('tourist_spot'); // 削除した description を復元
            $table->dropColumn('other_desc');
        });

        // events テーブルの変更を元に戻す
        Schema::table('events', function (Blueprint $table) {
            $table->string('country_name')->after('country_id'); // 削除した country_name を復元
        });
    }
};
