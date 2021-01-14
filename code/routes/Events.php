<?php

// GET /events
$base->get("/events", function () {
    $controller = new spark\Controllers\PageController;
    return $controller->{'page'}('events');
});

// GET /event/:slug
$base->get("/event/:slug", function ($slug) {
    $controller = new spark\Controllers\PageController;
    return $controller->{'page'}('event-' . $slug);
});
