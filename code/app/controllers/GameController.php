<?php

// Controller: Home

namespace spark\Controllers;

use \spark\Core\Controller as Controller;

use \spark\Models\GameModel;

use \R as R;

class GameController extends Controller
{
    function index()
    {
		$this->viewOpts['page']['layout'] = 'default';
        $this->viewOpts['page']['content'] = 'games/index';
        $this->viewOpts['page']['section'] = 'games';
        $this->viewOpts['page']['title'] = 'Games';

        $this->view->load($this->viewOpts, $this->viewData);
    }

    function game($game = '')
    {
		$this->viewOpts['page']['layout'] = 'default';
        $this->viewOpts['page']['content'] = 'games/' . $game . '/home';
        $this->viewOpts['page']['section'] = 'games';
        $this->viewOpts['page']['title'] = $game;

        $this->view->load($this->viewOpts, $this->viewData);
    }

    function exists($slug = '')
    {
        return file_exists(__DIR__ . '/../views/content/games/' . $slug . '/');
    }
}

