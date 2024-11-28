<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\SetCountryController;
use App\Http\Controllers\EventCountryController;

Route::get('/', function () {
    return view('welcomes.welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function(){

   // Home
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/event', [App\Http\Controllers\EventController::class, 'index'])->name('event');


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

    


    // 未整備Country

    Route::get('/country', function () {
        return view('countries.country');
    });

    Route::get('/add_country', function () {
        return view('countries.add_country');
    });

    Route::get('/update_country', function () {
        return view('countries.update_country');
    });


      // 未整備Edit Events
    Route::get('/edit_event_top', function () {
        return view('edit_events.edit_event_top');
    });

    Route::get('/select_event', function () {
        return view('edit_events.select_event');
    });

    Route::get('/add_event', function () {
        return view('edit_events.add_event');
    });

    Route::get('/update_event', function () {
        return view('edit_events.update_event');
    });
});



