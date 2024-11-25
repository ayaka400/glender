<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SetCountryController;
use App\Http\Controllers\EventCountryController;

Route::get('/', function () {
    return view('welcomes.welcome');
});

Auth::routes();

Route::get('/country_selection', [SetCountryController::class, 'showSelectionForm'])->name('counries.selection');

Route::group(['middleware' => 'auth'], function(){

   

    Route::patch('/post/{post_id}/unhide', [PostsController::class, 'unhide'])->name('post.unhide');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/event', [App\Http\Controllers\EventController::class, 'index'])->name('event');


    // Settings
    Route::get('/setting', function () {
        return view('settings.setting');
    });

    Route::get('/country_setting', function () {
        return view('settings.country_setting');
    });

    Route::get('/user_setting', function () {
        return view('settings.user_setting');
    });



});


