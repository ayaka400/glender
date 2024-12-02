<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\SetCountryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventCountryController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcomes.welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function(){

   // Home
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


    // Settings
    Route::get('/setting', function () {
        return view('settings.setting');
    })->name('setting');

    Route::get('/country_setting', function () {
        return view('settings.country_setting');
    })->name('country_setting');

    Route::get('/user_setting', function () {
        return view('settings.user_setting');
    });


    // Countries

    # 国追加ページにアクセスする
    Route::get('/countries/create', [CountryController::class, 'create'])->name('countries.create');

    # 新しい国を保存する
    Route::post('/countries/store', [CountryController::class, 'store'])->name('countries.store');

    # 特定の国の情報を表示する
    Route::get('/countries/{id}/show', [CountryController::class, 'show'])->name('countries.show');

    # 国情報編集ページにアクセスする
    Route::get('countries/{id}/edit', [CountryController::class, 'edit'])->name('countries.edit'); 

    # 国情報の変更を保存する
    Route::patch('countries/{id}/update', [CountryController::class, 'update'])->name('countries.update'); 

    # 国データを削除する
    Route::delete('countries/{id}/destroy', [CountryController::class, 'destroy'])->name('countries.destroy');  // destroyメソッド


    //Select Countries

    #初回の国選択画面を表示する
    Route::get('/country-selection', [SetCountryController::class, 'index'])->name('country-selection.index');

    #初回の国選択を保存する
    Route::post('/country-selection', [SetCountryController::class, 'store'])->name('country-selection.store');

    #ログイン後国選択を変更する画面を表示する
    Route::get('/country-setting', [SetCountryController::class, 'show'])->name('country-setting.show');

    #ログイン後の国選択変更を保存
    Route::post('/country-setting', [SetCountryController::class, 'update'])->name('country-setting.update');

    

    // Events
    #編集するイベントを選択するページ（イベント一覧）
    Route::get('/event/select_event', [EventController::class, 'index'])->name('events.select');

    # イベント追加ページにアクセスする
    Route::get('/events/create', [EventController::class, 'create'])->name('events.create');

    # 新しいイベントを保存する
    Route::post('/events/store', [EventController::class, 'store'])->name('events.store');

     # 特定のイベントの情報を表示する
     Route::get('/events/{id}/show', [EventController::class, 'show'])->name('events.show');

    # イベント編集ページにアクセスする
    Route::get('/events/{id}/edit', [EventController::class, 'edit'])->name('events.edit'); 

    # イベントの変更を保存する
    Route::patch('events/{id}/update', [EventController::class, 'update'])->name('events.update'); 

    # イベントデータを削除する
    Route::delete('events/{id}/destroy', [EventController::class, 'destroy'])->name('events.destroy');  

    # イベント編集トップ
    Route::get('/edit_event_top', function () {
        return view('edit_events.edit_event_top');
    })->name('edit_event_top');



    //Users
    Route::get('/user/settintgs', [UserController::class, 'edit'])->name('user.settings');
    Route::post('/user/settings', [UserController::class, 'update'])->name('user.settings.update');


});



