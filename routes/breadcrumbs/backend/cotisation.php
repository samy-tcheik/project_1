<?php

Breadcrumbs::for('admin.cotisation.create', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('nouvel cotisation', url('admin/cotisation/create'));
});
Breadcrumbs::for('admin.cotisation.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('liste des cotisations', url('admin/cotisation/'));
});
Breadcrumbs::for('admin.cotisation.edit', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Modifier cotisation', url('admin/cotisation/{id}/edit'));
});
Breadcrumbs::for('admin.cotisation.show', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Affichage cotisation', url('admin/cotisation/{cotisation}/show'));
});

