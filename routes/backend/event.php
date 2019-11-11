<?php

Route::get('eventment/event/index','EventController@index')->name('event.index');
Route::get('eventment/event/create','EventController@create')->name('event.create');
Route::post('event','EventController@store')->name('event.store');