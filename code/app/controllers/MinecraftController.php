<?php

// Controller: Minecraft

namespace spark\Controllers;

use \spark\Core\Controller as Controller;

use \spark\Models\MinecraftModel;
use \spark\Models\GameModel;

use \R as R;

class MinecraftController extends Controller
{
    function home()
    {
		$this->viewOpts['page']['layout']  = 'default';
        $this->viewOpts['page']['content'] = 'games/minecraft/home';
        $this->viewOpts['page']['section'] = 'games';
        $this->viewOpts['page']['title']   = 'Minecraft';

        $this->viewData['servers'] = GameModel::getServersByType('minecraft');

        $this->view->load($this->viewOpts, $this->viewData);
    }
}

