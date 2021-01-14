<?php

// GET /about
$base->get("/about", function () {
    $controller = new spark\Controllers\PageController;
    return $controller->{'page'}('history');
});

// GET /history
$base->get("/history", function () {
    $controller = new spark\Controllers\AboutController;
    return $controller->{'history'}();
});

// GET /staff
$base->get("/staff", function () {
    $controller = new spark\Controllers\AboutController;
    return $controller->{'staff'}();
});

// GET /donations
$base->get("/donations", function () {
    $controller = new spark\Controllers\PageController;
    return $controller->{'page'}('donations');
});
