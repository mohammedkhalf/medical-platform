<?php

Breadcrumbs::for('admin.reservations.index', function ($trail) {
    $trail->push(__('labels.backend.access.reservations.management'), route('admin.reservations.index'));
});

Breadcrumbs::for('admin.reservations.create', function ($trail) {
    $trail->parent('admin.reservations.index');
    $trail->push(__('labels.backend.access.reservations.management'), route('admin.reservations.create'));
});

Breadcrumbs::for('admin.reservations.edit', function ($trail, $id) {
    $trail->parent('admin.reservations.index');
    $trail->push(__('labels.backend.access.reservations.management'), route('admin.reservations.edit', $id));
});

Breadcrumbs::for('admin.reservations.store', function ($trail) {
    $trail->push('Title Here', route('admin.reservations.store'));
});

Breadcrumbs::for('admin.reservations.show', function ($trail,$profile) {
    $trail->parent('admin.reservations.index');
    $trail->push(__('labels.backend.access.reservations.management'), route('admin.reservations.show', $profile));
});