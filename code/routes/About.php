<?php

// GET /about
$base->get("/about", function () {
    $controller = new spark\Controllers\AboutController;
    return $controller->{'index'}();
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
