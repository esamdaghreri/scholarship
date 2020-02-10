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
Route::redirect('/', '/'.App::getlocale());
Route::group([ 'prefix' => '{locale}','middleware' => 'setlocale'], function() {
    Route::get('/', 'User\HomeController@index')->name('user.home');

    // For change language
    Route::get('local/{locale}', function($locale) {
        App::setLocale($locale);
        // Session::put('locale', $locale);
        return redirect()->back();
    })->name('localization');

});