<?php

Breadcrumbs::for('admin.analysis.index', function ($trail) {
    $trail->push(__('labels.backend.access.analysis.management'), route('admin.analysis.index'));
});

Breadcrumbs::for('admin.analysis.create', function ($trail) {
    $trail->parent('admin.analysis.index');
    $trail->push(__('labels.backend.access.analysis.management'), route('admin.analysis.create'));
});

Breadcrumbs::for('admin.analysis.edit', function ($trail, $id) {
    $trail->parent('admin.analysis.index');
    $trail->push(__('labels.backend.access.analysis.management'), route('admin.analysis.edit', $id));
});
