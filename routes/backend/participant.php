<?php

use App\Http\Controllers\Backend\ParticipantController;

route::get('evenment/event/participant/create/{id}','ParticipantController@create')->name('participant.create');
route::post('evenment/event/participant/store_participant','ParticipantController@storeParticipant')->name('participant.store');
route::post('evenment/event/participant/store_payeur','ParticipantController@storePayeur')->name('payeur.store');
route::get('evenment/event/participant/list/{id}','ParticipantController@list')->name('participant.list');
route::post('evenment/event/participant/presence/{id}','ParticipantController@presence')->name('participant.presence');
//ajaxroute
route::get('evenment/event/participant/ajaxdatatable/{id}','ParticipantController@ajaxDatatable')->name('participant.ajaxdt');