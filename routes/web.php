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
        Route::get('/requests/language', 'Admin\AdminCancelScholarhipController@index')->name('admin.request.language');
        Route::get('/requests/cancel', 'Admin\AdminCancelScholarhipController@index')->name('admin.request.cancel');
        Route::get('/requests/extend', 'Admin\AdminExtendScholarshipController@index')->name('admin.request.extend');
        Route::get('/requests/change-fellowship', 'Admin\AdminChangeFellowshipController@index')->name('admin.request.change_fellowship');

        // ================ Route for admin register scholarship dashboard =====================
        Route::get('/register/scholarship/{id}', 'Admin\AdminRegisterScholarshipController@show')->name('admin.registerScholarship.show');
        Route::get('/register/scholarship/{id}/edit', 'Admin\AdminRegisterScholarshipController@edit')->name('admin.registerScholarship.edit');
        Route::post('/register/scholarship/approve', 'Admin\AdminRegisterScholarshipController@approve')->name('admin.registerScholarship.approve');
        Route::post('/register/scholarship/reject', 'Admin\AdminRegisterScholarshipController@reject')->name('admin.registerScholarship.reject');

        // ================ Route for admin extend scholarship dashboard =====================
        Route::get('/extend/scholarship/{id}', 'Admin\AdminExtendScholarshipController@show')->name('admin.extendScholarship.show');
        Route::get('/extend/scholarship/{id}/edit', 'Admin\AdminExtendScholarshipController@edit')->name('admin.extendScholarship.edit');
        Route::post('/extend/scholarship/approve', 'Admin\AdminExtendScholarshipController@approve')->name('admin.extendScholarship.approve');
        Route::post('/extend/scholarship/reject', 'Admin\AdminExtendScholarshipController@reject')->name('admin.extendScholarship.reject');

        // ================ Route for admin cancel scholarship dashboard =====================
        Route::get('/cancel/scholarship/{id}', 'Admin\AdminCancelScholarhipController@show')->name('admin.cancelScholarship.show');
        Route::get('/cancel/scholarship/{id}/edit', 'Admin\AdminCancelScholarhipController@edit')->name('admin.cancelScholarship.edit');
        Route::post('/cancel/scholarship/approve', 'Admin\AdminCancelScholarhipController@approve')->name('admin.cancelScholarship.approve');
        Route::post('/cancel/scholarship/reject', 'Admin\AdminCancelScholarhipController@reject')->name('admin.cancelScholarship.reject');

        // ================ Route for admin change supervisor scholarship dashboard =====================
        Route::get('/changesupervisor/scholarship/{id}', 'Admin\AdminChangeSupervisorController@show')->name('admin.changeSupervisorScholarship.show');
        Route::get('/changesupervisor/scholarship/{id}/edit', 'Admin\AdminChangeSupervisorController@edit')->name('admin.changeSupervisorScholarship.edit');
        Route::post('/changesupervisor/scholarship/approve', 'Admin\AdminChangeSupervisorController@approve')->name('admin.changeSupervisorScholarship.approve');
        Route::post('/changesupervisor/scholarship/reject', 'Admin\AdminChangeSupervisorController@reject')->name('admin.changeSupervisorScholarship.reject');

        // ================ Route for admin change fellowship scholarship dashboard =====================
        Route::get('/changefellowship/scholarship/{id}', 'Admin\AdminChangeFellowshipController@show')->name('admin.changeFellowshipScholarship.show');
        Route::get('/changefellowship/scholarship/{id}/edit', 'Admin\AdminChangeFellowshipController@edit')->name('admin.changeFellowshipScholarship.edit');
        Route::post('/changefellowship/scholarship/approve', 'Admin\AdminChangeFellowshipController@approve')->name('admin.changeFellowshipScholarship.approve');
        Route::post('/changefellowship/scholarship/reject', 'Admin\AdminChangeFellowshipController@reject')->name('admin.changeFellowshipScholarship.reject');

        // ================ Route for admin language scholarship dashboard =====================
        Route::get('/language/scholarship/{id}', 'Admin\AdminLanguageScholarshipController@show')->name('admin.languageScholarship.show');
        Route::get('/language/scholarship/{id}/edit', 'Admin\AdminLanguageScholarshipController@edit')->name('admin.languageScholarship.edit');
        Route::post('/language/scholarship/approve', 'Admin\AdminLanguageScholarshipController@approve')->name('admin.languageScholarship.approve');
        Route::post('/language/scholarship/reject', 'Admin\AdminLanguageScholarshipController@reject')->name('admin.languageScholarship.reject');

        // ================ Route for admin reports dashboard =====================
        Route::get('/report', 'Admin\AdminReportsController@index')->name('admin.report.index');
        Route::get('/report/seach', 'Admin\AdminReportsController@search')->name('admin.report.search');
        Route::get('/report/{id}', 'Admin\AdminReportsController@show')->name('admin.report.show');

    });
});

// Change language
Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
})->name('setLanguage');