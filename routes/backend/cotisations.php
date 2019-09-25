<?php
/**
 * Created by PhpStorm.
 * User: Morti
 * Date: 31/08/2019
 * Time: 04:34
 */
Route::resource('cotisation','CotisationController');

Route::get('/ajaxIndex',"CotisationController@ajaxIndex")
    ->name("ajaxIndex");

Route::get('/ajaxAdherent',"CotisationController@ajaxAdherent")
    ->name("ajaxAdherent");
