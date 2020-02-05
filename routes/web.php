<?php
Route::redirect('/', '/admin/home');

Auth::routes(['register' => false]);

// Change Password Routes...
Route::get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
Route::patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('members','MemberController');
    Route::resource('nominees', 'NomineeController');
    Route::resource('land-purchase', 'LandPurchaseController');
    Route::resource('bayna', 'BaynaController');
    Route::resource('plot', 'PlotController');
    Route::resource('bank', 'BankController');
    Route::resource('deposit', 'DepositController');
    Route::resource('reference', 'ReferenceController');
    Route::resource('expense-head', 'ExpenceHeadController');
    Route::resource('expense', 'ExpenceController');
    Route::resource('users', 'UserController');
    Route::resource('sale', 'SaleController');
});


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
