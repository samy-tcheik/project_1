<?php
route::post('evenment/event/participant/store_participant','ParticipantController@storeParticipant')->name('participant.store');
route::post('evenment/event/participant/presence/{id}','ParticipantController@presence')->name('participant.presence');
//emargement
route::get('evenment/event/participant/list/{id}','ParticipantController@list')->name('participant.list');
route::get('evenment/event/participant/ajaxdatatable/{id}','ParticipantController@ajaxDatatable')->name('participant.ajaxdt');
//gestion-participant
route::get('evenment/event/participant/ajax_gestion_participant/{id}','ParticipantController@gestionParticipant')->name('participant.gestion');
route::delete('evenment/event/participant/delete/{id}','ParticipantController@delete')->name('participant.delete');
route::get('evenment/event/participant/edit/{id}','ParticipantController@edit')->name('participant.edit');
route::patch('evenment/event/participant/update{id}','ParticipantController@update')->name('participant.update');
//select2 ajax route
route::get('evenment/event/participant/getadherent','ParticipantController@getAdherent')->name('participant.getadherent');
route::get('participant/montant/{event_id}','ParticipantController@getMontant')->name('participant.montant');
//Forms
route::get('participant_edit/{id}','ParticipantController@getParticipantForm')->name('editParticipant');
route::get('payeur_edit/{id}','PayeurController@getPayeurForm')->name('editPayeur');