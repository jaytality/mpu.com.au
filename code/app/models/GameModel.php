<?php

namespace spark\Models;

use \spark\Core\Model as Model;

use \R as R;

class GameModel extends Model
{
    public static function getServersInfo()
    {
        $servers = R::find('game_servers');
        return $servers;
    }
}

// end of file
