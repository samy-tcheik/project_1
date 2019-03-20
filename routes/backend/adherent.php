<?php
/**
 * Created by PhpStorm.
 * User: lothbrock
 * Date: 03/03/19
 * Time: 01:44 م
 */
Route::get('/adherentArchive','AdherentController@archive')->name('adherent.archive');
Route::get('/adherentRestore/{id}' , 'AdherentController@restore')->name('adherent.restore');


Route::resource('/adherents', 'AdherentController');

/*
Route::group([
    //'prefix'     => 'auth',
    //'as'         => 'auth.',
    //'namespace'  => 'Auth',
    //'middleware' => 'role:'.config('access.users.admin_role'),
], function () {

});*/
