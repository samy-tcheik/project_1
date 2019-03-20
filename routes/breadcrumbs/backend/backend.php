<?php

Breadcrumbs::for('admin.dashboard', function ($trail) {
    $trail->push(__('strings.backend.dashboard.title'), route('admin.dashboard'));
});
Breadcrumbs::for('admin.foreign.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('customizing fields', route('admin.foreign.index'));
});

require __DIR__.'/auth.php';
require __DIR__.'/log-viewer.php';
require  __DIR__.'/adherent.php' ;