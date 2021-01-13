<?php

// GET /game
$base->get("/game", function () {
    $controller = new spark\Controllers\GameController;
    return $controller->{'index'}();
});

// GET /game/:shortname
$base->get("/game/:game", function ($game) {
    $controller = new spark\Controllers\GameController;
    return $controller->{'game'}($game);
});
