<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('admin.event.index',function ($trail){
    $trail->parent('admin.dashboard');
    $trail->push('Events management', url('admin/event'));
});

Breadcrumbs::for('admin.event.create',function ($trail){
    $trail->parent('admin.event.index');
    $trail->push('New Event', url('admin/event/new'));
});

Breadcrumbs::for('admin.event.edit',function ($trail){
    $trail->parent('admin.event.index');
    $trail->push('Edit event', url('admin/avent/edit'));
});

Breadcrumbs::for('admin.participant.create',function($trail){
    $trail->parent('admin.event.index');
    $trail->push('Créer Participant', url('admin/event/participant/create'));
});

Breadcrumbs::for('admin.participant.list',function($trail){
    $trail->parent('admin.event.index');
    $trail->push('Emargement', url('admin/event/emargement'));
});