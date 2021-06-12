<?php

Breadcrumbs::for('admin.specialists.index', function ($trail) {
    $trail->push(__('labels.backend.access.specialists.management'), route('admin.specialists.index'));
});

Breadcrumbs::for('admin.specialists.create', function ($trail) {
    $trail->parent('admin.specialists.index');
    $trail->push(__('labels.backend.access.specialists.management'), route('admin.specialists.create'));
});

Breadcrumbs::for('admin.specialists.edit', function ($trail, $id) {
    $trail->parent('admin.specialists.index');
    $trail->push(__('labels.backend.access.specialists.management'), route('admin.specialists.edit', $id));
});

Breadcrumbs::for('admin.specialists.store', function ($trail) {
    $trail->push('Title Here', route('admin.specialists.store'));
});

Breadcrumbs::for('admin.specialists.show', function ($trail,$profile) {
    $trail->parent('admin.specialists.index');
    $trail->push(__('labels.backend.access.specialists.management'), route('admin.specialists.show', $profile));
});