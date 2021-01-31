<?php

// GET /game
$base->get("/game", function () {
    $controller = new spark\Controllers\PageController;
    return $controller->{'page'}('game');
});

// Minecraft
// GET /game/minecraft
$base->get("/game/minecraft", function () {
    $controller = new spark\Controllers\MinecraftController;
    return $controller->{'home'}();
});

// Rust
// GET /game/rust
$base->get("/game/rust", function () {
    $controller = new spark\Controllers\RustController;
    return $controller->{'home'}();
});

// GET /game/:shortname
$base->get("/game/:game", function ($game) {
    $controller = new spark\Controllers\PageController;
    return $controller->{'page'}('game-' . $game);
});
