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


    // Countries
    Route::get('/country', function () {
        return view('countries.country');
    });

    Route::get('/add_country', function () {
        return view('countries.add_country');
    });

    Route::get('/update_country', function () {
        return view('countries.update_country');
    });


      // Edit Events
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



