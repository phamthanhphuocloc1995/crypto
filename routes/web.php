<?php

// Trang hệ thống

Route::get('system/signin','Auth\AuthController@getSignin')->name('system.getSignin');
Route::post('system/signin','Auth\AuthController@postSignin')->name('system.postSignin');
Route::get('system/signout','Auth\AuthController@getSignout')->name('system.getSignout');
Route::get('system/signup','Auth\AuthController@getSignup')->name('system.getSignup');
Route::post('system/signup','Auth\AuthController@postSignup')->name('system.postSignup');
Route::get('system/forgot-password','Auth\AuthController@getForgotPassword')->name('system.getForgotPassword');
Route::get('system/updatepassword/{token}','Auth\AuthController@getUpdatePassword')->name('system.getUpdatePassword');
Route::post('system/updatepassword/{token}','Auth\AuthController@postUpdatePassword')->name('system.postUpdatePassword');

Route::group(['prefix' => 'system','middleware' => 'guest'], function () {
    Route::get('/dashboard','System\DashboardController@getDashboard')->name('system.getDashboard');
    Route::get('/profile','System\ProfileController@getProfile')->name('system.getProfile');
    Route::post('/profile/updateotpverify','System\ProfileController@postUpdateotpverify')->name('system.postUpdateotpverify');
    Route::post('/profile/updatepassword','System\ProfileController@postUpdatepassword')->name('system.postUpdatepassword');
    Route::post('/profile/updateavatar', 'System\ProfileController@postUpdateavatar')->name('system.postUpdateavatar');
    Route::get('/memberlist','System\MemberController@getMemberlist')->name('system.getMemberlist');
    Route::get('/membertree','System\MemberController@getMembertree')->name('system.getMembertree');
    Route::get('/deposit','System\MemberController@getDeposit')->name('system.getDeposit');
    Route::get('/withdraw','System\MemberController@getWithdraw')->name('system.getWithdraw');
});
