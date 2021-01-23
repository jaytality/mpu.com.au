<?php

// Controller: Rust

namespace spark\Controllers;

use \spark\Core\Controller as Controller;

use \spark\Models\RustModel;
use \spark\Models\GameModel;

use \R as R;

class RustController extends Controller
{
    function home()
    {
		$this->viewOpts['page']['layout']  = 'default';
        $this->viewOpts['page']['content'] = 'games/rust/home';
        $this->viewOpts['page']['section'] = 'games';
        $this->viewOpts['page']['title']   = 'Rust';

        $this->viewData['servers'] = GameModel::getServersByType('rust');
        $this->viewData['soloplayers'] = RustModel::getSoloPlayerStats();
        $this->viewData['monthlyplayers'] = RustModel::getMonthlyPlayerStats();

        // $this->viewData['trioplayers'] = RustModel::getTrioPlayers();

        $this->view->load($this->viewOpts, $this->viewData);
    }
}

