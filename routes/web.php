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

    // ================ Route for user personnel information ==============
    Route::group(['prefix' => 'user-panel/personnel/'], function() {
        Route::get('/showPersonnel', 'User\PersonnelController@showPersonnelData')->name('personnel.showPersonnelData');
        Route::match(['PUT', 'PATCH'], '/showPersonnel/{personnel}', 'User\PersonnelController@updatePersonnelData')->name('personnel.updatePersonnelData');
        Route::get('showPrivacy/{personnel}', 'User\PersonnelController@showPrivacy')->name('personnel.showPrivacy');
        Route::match(['PUT', 'PATCH'], '/user-panel/personnel/showPrivacy/{personnel}', 'User\PersonnelController@updatePrivacy')->name('personnel.updatePrivacy');
        Route::get('/orders', 'User\PersonnelController@showOrders')->middleware('checkPersonalInformationFill')->name('personnel.showOrders');
    });

    Route::group(['prefix' => 'scholarship/', 'middleware' => ['checkPersonalInformationFill']], function() {

        // ================ Route for user registeration of scholarship ==============
        Route::resource('/register', 'User\RegisterScholarshipController')->only(['show', 'create', 'store', 'update'])->middleware('checkPersonalInformationFill');

        // ================ Route for user cancel of scholarship =====================
        Route::get('/cancel/{id}', 'User\CancelScholarshipController@create')->middleware('checkPersonalInformationFill')->name('cancel.create');
        Route::post('/cancel', 'User\CancelScholarshipController@store')->middleware('checkPersonalInformationFill')->name('cancel.store');
        Route::get('/cancel/show/{id}', 'User\CancelScholarshipController@show')->middleware('checkPersonalInformationFill')->name('cancel.show');

        // ================ Route for user cancel of scholarship =====================
        Route::get('/extend/{id}', 'User\ExtendScholarshipController@create')->middleware('checkPersonalInformationFill')->name('extend.create');
        Route::post('/extend', 'User\ExtendScholarshipController@store')->middleware('checkPersonalInformationFill')->name('extend.store');
        Route::get('/extend/show/{id}', 'User\ExtendScholarshipController@show')->middleware('checkPersonalInformationFill')->name('extend.show');
        
        // ================ Route for user change supervisor of scholarship =====================
        Route::get('/change-supervisor/{id}', 'User\ChangeSupervisorScholarshipController@create')->middleware('checkPersonalInformationFill')->name('changeSupervisor.create');
        Route::post('/change-supervisor', 'User\ChangeSupervisorScholarshipController@store')->middleware('checkPersonalInformationFill')->name('changeSupervisor.store');
        Route::get('/change-supervisor/show/{id}', 'User\ChangeSupervisorScholarshipController@show')->middleware('checkPersonalInformationFill')->name('changeSupervisor.show');

        // ================ Route for user for study language scholarship =====================
        Route::get('/language-scholarship', 'User\LanguageScholarshipController@create')->middleware('checkPersonalInformationFill')->name('languageScholarship.create');
        Route::post('/language-scholarship', 'User\LanguageScholarshipController@store')->middleware('checkPersonalInformationFill')->name('languageScholarship.store');
        Route::get('/language-scholarship/show/{id}', 'User\LanguageScholarshipController@show')->middleware('checkPersonalInformationFill')->name('languageScholarship.show');
    });

});

// Change language
Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
})->name('setLanguage');