<?php


Route::get('Dashboard/Login','AdminLoginController@showForm')->name('adminLogin');
Route::post('Dashboard/Login','AdminLoginController@login')->name('adminLogin');


Route::group(['prefix' => 'Dashboard',
              'middleware' => 'auth:admin',
              'as' => 'admin.'], function (){

    Route::view('/','admin.index');

    /// Admins
    Route::resource('Admins','AdminsController');

    // msgs
    Route::get('msgs','MsgsController@index')->name('msgs.index');
    Route::get('msgs/delete/{id}','MsgsController@delete')->name('msgs.delete');

});
