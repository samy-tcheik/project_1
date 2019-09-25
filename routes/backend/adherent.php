<?php
/**
 * Created by PhpStorm.
 * User: lothbrock
 * Date: 03/03/19
 * Time: 01:44 م
 */


/*
Route::get('adherents/{prospect}' ,'AdherentController@index' , $prospect);*/

Route::get('adherents/{prospect}',"AdherentController@index")->name('adherents.index');

Route::get('/adherent/Trash/{prospect}','AdherentController@trashed')->name('adherent.trashed');
Route::get('/adherent/Restore/{id}' , 'AdherentController@restore')->name('adherent.restore');
Route::post('/adherent/archive/{adherent}' , 'AdherentController@archive')->name('adherent.archive');
Route::post('adherents' , 'AdherentController@store')->name('adherents.store');
Route::get('adherents/create/{adherent}' , 'AdherentController@create')->name('adherents.create');
Route::get('adherents/{adherent}/show' , 'AdherentController@show')->name('adherents.show');
Route::delete('adherents/{adherent}' , 'AdherentController@destroy')->name('adherents.destroy');
Route::get('adherents/{adherent}/edit' , 'AdherentController@edit')->name('adherents.edit');
Route::put('adherents/{adherent}/' , 'AdherentController@update')->name('adherents.update');
Route::post('adherents/changeProspect/{adherent}' ,'AdherentController@change')->name('adherents.makeAdh');




/*
Route::group([
    //'prefix'     => 'auth',
    //'as'         => 'auth.',
    //'namespace'  => 'Auth',
    //'middleware' => 'role:'.config('access.users.admin_role'),
], function () {

});*/
