<?php

Breadcrumbs::for('admin.prospect.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('prospects management', url('admin/prospect'));
});

Breadcrumbs::for('admin.prospect.show', function ($trail  , $adherent) {
    $trail->parent('admin.prospect.index');
    $trail->push('voir prospect ', url('admin/adherents/', $adherent));
});

Breadcrumbs::for( 'admin.prospect.create', function ($trail ) {
    $trail->parent('admin.prospect.index');
    $trail->push('nouveau prospect', url('admin/prospect/create'));
});


Breadcrumbs::for('admin.prospect.edit', function ($trail,$adherent) {
    $trail->parent('admin.prospect.index');
    $trail->push('modifier prospect', url('admin/prospect/{adherent}/Edit/',$adherent));
});


Breadcrumbs::for('admin.prospect.trashed', function ($trail) {
    $trail->parent('admin.prospect.index');
    $trail->push('prospect supprimmé ', url('admin/prospect/Trash/'));
});