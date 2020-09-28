<?php

Route::get('evenment/event/index','EventController@index')->name('event.index');
Route::post('evenment/event/store','EventController@store')->name('event.store');
Route::get('evenment/event/edit/{id}','EventController@edit')->name('event.edit');
Route::post('evenment/event/{id}','EventController@update')->name('event.update');
Route::delete('evenment/event/delete/{id}','EventController@destroy')->name('event.destroy');
//Datatables serverside routes
Route::get('evenment/event/ajaxdatatable','EventController@eventDatatable')->name('event.event_datatable');
//select2 routes
Route::get('evenment/get_type','EventController@getType')->name('event.getType');
Route::get('evenment/get_montant','EventController@getMontant')->name('event.getMontant');
Route::get('evenment/get_responsable','EventController@getResponsable')->name('event.getResponsable');
//forms
Route::get('event_edit/{id}','EventController@getEventForm')->name('eventEdit');