<?php
/**
 * Created by PhpStorm.
 * User: lothbrock
 * Date: 03/03/19
 * Time: 01:44 م
 */




//Route::get('adherent' , [::class , 'index' ]);


Route::get('/adherents', 'AdherentController@index')->name('adherent.index');
Route::get('/adherent/{id}' , 'AdherentController@show')->name("adherent.show");
Route::get('/adherentCreate' , 'AdherentController@create')->name("adherent.create");
Route::post('/adherentStore' , 'AdherentController@store')->name('adherent.store');
Route::get('/adherentEdit/{id}'  , 'AdherentController@edit' )->name('adherent.edit');
Route::get('/adherentDelete/{id}' , 'AdherentController@delete')->name('adherent.delete');
Route::post('/adherentUpdate/{id}', 'AdherentController@update')->name('adherent.update');
Route::get('/adherentArchive','AdherentController@archive')->name('adherent.archive');
Route::get('/adherentRestore/{id}' , 'AdherentController@restore')->name('adherent.restore');
//Route::get('/adherentnew' ,'adherent_controller@create');
