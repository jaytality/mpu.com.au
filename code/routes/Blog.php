<?php

// GET /blog/post/:slug
$base->get("/blog/post/:slug", function ($slug) {
    $controller = new spark\Controllers\BlogController;
    return $controller->{'post'}($slug);
});

// GET /blog/:slug
$base->get("/blog/:slug", function ($slug) {
    $controller = new spark\Controllers\BlogController;
    return $controller->{'category'}($slug);
});
