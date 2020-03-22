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

Route::group(['middleware'], function() {
    // Authentication routes
    Auth::routes(['verify' => true]);
    Route::get('/', 'User\HomeController@index')->name('user.home');
});

// ================ Route has middleware that users must be verifying email ==============
Route::group(['middleware' => ['verified', 'auth']], function() {

    // ================ Route for user personnel information ==============
    Route::group(['prefix' => 'user-panel/personnel/'], function() {
        Route::get('/showPersonnel', 'User\PersonnelController@showPersonnelData')->name('personnel.showPersonnelData');
        Route::match(['PUT', 'PATCH'], '/showPersonnel/{personnel}', 'User\PersonnelController@updatePersonnelData')->name('personnel.updatePersonnelData');
        Route::get('showPrivacy/{personnel}', 'User\PersonnelController@showPrivacy')->name('personnel.showPrivacy');
        Route::match(['PUT', 'PATCH'], '/user-panel/personnel/showPrivacy/{personnel}', 'User\PersonnelController@updatePrivacy')->name('personnel.updatePrivacy');
        Route::get('/orders', 'User\PersonnelController@showOrders')->middleware('checkPersonalInformationFill')->name('personnel.showOrders');
    });

    // User routes
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
        Route::get('/language-scholarship/show/{id}', 'User\LanguageScholarshipController@show')->middleware('checkPersonalInformationFill')->name('languageScholarship.show');

        // ================ Route for user change supervisor of scholarship =====================
        Route::get('/change-fellowship/{id}', 'User\ChangeFellowshipScholarshipController@create')->middleware('checkPersonalInformationFill')->name('changeFellowship.create');
        Route::post('/change-fellowship', 'User\ChangeFellowshipScholarshipController@store')->middleware('checkPersonalInformationFill')->name('changeFellowship.store');
        Route::get('/change-fellowship/show/{id}', 'User\ChangeFellowshipScholarshipController@show')->middleware('checkPersonalInformationFill')->name('changeFellowship.show');
        
    });

    // Admin routes
    Route::group(['prefix' => 'admin/dashboard', 'middleware' => ['checkPersonalInformationFill', 'admin']], function() {
        Route::get('/', 'Admin\AdminDashboardController@index')->name('admin.index');

        // ================ Route for admin user dashboard =====================
        Route::resource('/users', 'Admin\AdminUsersController')->except([
            'create',
            'destroy'
        ])->names([
            'index' => 'admin.user.index',
            'store' => 'admin.user.store',
            'show' => 'admin.user.show',
            'edit' => 'admin.user.edit',
            'update' => 'admin.user.update',
        ]);
        Route::post('/users/banned', 'Admin\AdminUsersController@banned')->name('admin.user.banned');


        // ================ Route for admin request dashboard =====================
        Route::get('/requests', 'Admin\AdminRequestsController@index')->name('admin.request.index');
        
    });
});

// Change language
Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
})->name('setLanguage');