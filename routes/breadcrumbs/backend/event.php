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