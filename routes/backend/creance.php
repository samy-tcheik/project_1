<?php
Route::get('evenment/event/creance/{id}','CreanceController@creance')->name('event.creance');
Route::get('evenment/event/creance/creance_datatables/{id}','CreanceController@creanceDatatable')->name('event.creance_datatables');