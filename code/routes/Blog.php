<?php

// GET /blog/:category
$base->get("/blog/:slug", function ($slug) {
    $controller = new spark\Controllers\BlogController;
    return $controller->{'category'}($slug);
});
