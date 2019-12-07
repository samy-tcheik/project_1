<?php

Route::get('evenment/event/index','EventController@index')->name('event.index');
Route::get('evenment/event/create','EventController@create')->name('event.create');
Route::post('event','EventController@store')->name('event.store');
Route::get('evenment/event/edit/{id}','EventController@edit')->name('event.edit');
Route::patch('evenment/event/{event}','EventController@update')->name('event.update');
Route::delete('evenment/event/{id}','EventController@destroy')->name('event.destroy');
//AJAXroute
Route::get('evenment/event/ajaxdatatable','EventController@ajaxDatatable')->name('event.ajaxdt');