<?php

// GET /game
$base->get("/game", function () {
    $controller = new spark\Controllers\PageController;
    return $controller->{'page'}('game');
});

// GET /game/:shortname
$base->get("/game/:game", function ($game) {
    $controller = new spark\Controllers\PageController;
    return $controller->{'page'}('game-' . $game);
});
