<?php
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('admin.type.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Type management', url('admin/event/type'));
});

Breadcrumbs::for('admin.type.create', function ($trail) {
    $trail->parent('admin.type.index');
    $trail->push('New type', url('admin/event/type/new'));
});

Breadcrumbs::for('admin.type.edit', function ($trail) {
    $trail->parent('admin.type.index');
    $trail->push('Modify Type', url('admin/event/type/modify'));
});