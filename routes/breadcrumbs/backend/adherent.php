<?php

Breadcrumbs::for('admin.adherents.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('adherents management', url('admin/adherents'));
});

Breadcrumbs::for('admin.adherent.show', function ($trail  , $id) {
    $trail->parent('admin.adherent.index');
    $trail->push('view adherent ', url('admin/adherent/', $id));
});

Breadcrumbs::for( 'admin.adherents.create', function ($trail ) {
    $trail->parent('admin.adherents.index');
    $trail->push('new adherent', url('admin/adherent/create'));
});


Breadcrumbs::for('admin.adherent.edit', function ($trail,$id) {
    $trail->parent('admin.adherent.index');
    $trail->push('edit adherent', url('admin/adherentEdit/',$id));
});


Breadcrumbs::for('admin.adherent.archive', function ($trail) {
    $trail->parent('admin.adherent.index');
    $trail->push('adherent archive', url('admin/adherentArchive/'));
});
/*Breadcrumbs::for('log-viewer::logs.list', function ($trail) {
    $trail->parent('log-viewer::dashboard');
    $trail->push(__('menus.backend.log-viewer.logs'), url('admin/log-viewer/logs'));
});*/

