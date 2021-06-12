<?php

Breadcrumbs::for('admin.dashboard', function ($trail) {
    $trail->push(__('strings.backend.dashboard.title'), route('admin.dashboard'));
});

require __DIR__.'/auth.php';
require __DIR__.'/log-viewer.php';
require __DIR__.'/blogs/blog.php';
require __DIR__.'/blog-categories/blog-categories.php';
require __DIR__.'/blog-tags/blog-tags.php';
require __DIR__.'/pages/page.php';
require __DIR__.'/faqs/faq.php';
require __DIR__.'/email-templates/email-template.php';
require __DIR__.'/auth/permission.php';
require __DIR__.'/drugs/drug.php';
require __DIR__.'/orders/order.php';
require __DIR__.'/profiles/profile.php';
require __DIR__.'/specialists/specialist.php';
require __DIR__.'/reservations/reservation.php';
require __DIR__.'/analysis/analysis.php';

