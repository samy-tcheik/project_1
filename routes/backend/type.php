<?php

Route::get('eventment/type/index','TypeController@index')->name('type.index');
Route::get('eventment/type/create','TypeController@create')->name('type.create');
Route::post('type','TypeController@store')->name('type.store');
Route::get('eventment/type/edit/{id}','TypeController@edit')->name('type.edit');
Route::patch('eventment/type/{type}','TypeController@update')->name('type.update');
Route::delete('eventment/type/{type}','TypeController@destroy')->name('type.destroy');