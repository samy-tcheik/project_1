<?php

Breadcrumbs::for('admin.adherents.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('adherents management', url('admin/adherents/0'));
});

Breadcrumbs::for('admin.adherents.show', function ($trail  , $adherent) {
    $trail->parent('admin.adherents.index');
    $trail->push('view adherent ', url('admin/adherents/', $adherent));
});

Breadcrumbs::for( 'admin.adherents.create', function ($trail ) {
    $trail->parent('admin.adherents.index');
    $trail->push('new adherent', url('admin/adherents/create'));
});


Breadcrumbs::for('admin.adherents.edit', function ($trail,$adherent) {
    $trail->parent('admin.adherents.index');
    $trail->push('edit adherent', url('admin/adherents/{adherent}/Edit/',$adherent));
});


Breadcrumbs::for('admin.adherent.trashed', function ($trail) {
    $trail->parent('admin.adherents.index');
    $trail->push('adherent archive', url('admin/adherent/Trash/'));
});
/*Breadcrumbs::for('log-viewer::logs.list', function ($trail) {
    $trail->parent('log-viewer::dashboard');
    $trail->push(__('menus.backend.log-viewer.logs'), url('admin/log-viewer/logs'));
});*/

