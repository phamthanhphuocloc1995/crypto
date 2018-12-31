<?php

// Trang hệ thống

Route::get('system/signin','Auth\AuthController@getSignin')->name('system.getSignin');
Route::post('system/signin','Auth\AuthController@postSignin')->name('system.postSignin');
Route::get('system/signup','Auth\AuthController@getSignup')->name('system.getSignup');
Route::post('system/signup','Auth\AuthController@postSignup')->name('system.postSignup');
Route::get('system/forgot-password','Auth\AuthController@getForgotPassword')->name('system.getForgotPassword');
Route::get('system/updatepassword/{token}','Auth\AuthController@getUpdatePassword')->name('system.getUpdatePassword');
Route::post('system/updatepassword/{token}','Auth\AuthController@postUpdatePassword')->name('system.postUpdatePassword');

Route::group(['prefix' => 'system'], function () {

});
