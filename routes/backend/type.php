<?php

Route::get('evenment/type/index','TypeController@index')->name('type.index');
Route::get('evenment/type/ajaxdatatable','TypeController@ajaxDatatable')->name('type.ajaxdt');
Route::get('evenment/type/create','TypeController@create')->name('type.create');
Route::post('type','TypeController@store')->name('type.store');
Route::get('evenment/type/edit/{id}','TypeController@edit')->name('type.edit');
Route::patch('evenment/type/{type}','TypeController@update')->name('type.update');
Route::delete('evenment/type/{id}','TypeController@destroy')->name('type.destroy');