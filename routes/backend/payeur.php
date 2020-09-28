<?php
route::post('evenment/event/participant/store_payeur','PayeurController@storePayeur')->name('payeur.store');
route::get('evenment/event/payeur/edit/{id}','PayeurController@editPayeur')->name('payeur.edit');
route::patch('evenment/event/payeur/update/{id}','PayeurController@updatePayeur')->name('payeur.update');
