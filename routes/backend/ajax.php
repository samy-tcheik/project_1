<?php
/**
 * Created by PhpStorm.
 * User: lothbrock
 * Date: 28/03/19
 * Time: 03:45 ص
 */
Route::post('/AutoComplete', 'AutoCompleteController@fetch')->name('autoComplete');
Route::post('/CheckNumber','AutoCompleteController@verifierDossier')->name('checkNumber');
Route::get('/tables/{prospect}','AdherentController@ajaxDataTables')->name("dataTables");
