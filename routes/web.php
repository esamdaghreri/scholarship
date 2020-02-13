<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// When enter to main link of website, redirect to default language
Route::group(['middleware' => 'setlocale'], function() {
    // Authentication routes
    Auth::routes();
    Route::get('/', 'User\HomeController@index')->name('user.home');
});

// Change language
Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
})->name('setLanguage');