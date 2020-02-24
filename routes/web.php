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
    Auth::routes(['verify' => true]);
    Route::get('/', 'User\HomeController@index')->name('user.home');
});


// ================ Route has middleware that users must be verifying email ==============
Route::group(['middleware' => ['setlocale', 'verified', 'auth']], function() {
    // ================ Route for user personnel page ==============
    Route::resource('/user-panel/personnel', 'User\PersonnelController')->only([
        'show', 'update',
    ]);
    Route::get('/user-panel/personnel/showPrivacy/{personnel}', 'User\PersonnelController@showPrivacy')->name('personnel.showPrivacy');
    Route::match(['PUT', 'PATCH'], '/user-panel/personnel/showPrivacy/{personnel}', 'User\PersonnelController@updatePrivacy')->name('personnel.updatePrivacy');

    // ================ Route for user orders personnel page ==============
    Route::resource('/scholarship', 'User\OrderScholarshipController')->middleware('checkPersonalInformationFill');
});

// Change language
Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
})->name('setLanguage');