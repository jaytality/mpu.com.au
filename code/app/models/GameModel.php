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

    public static function getServersByType($type = '')
    {
        if (empty($type)) {
            return null;
        }

        $servers = R::find('game_servers', ' WHERE type = ?', [ $type ]);
        return $servers;
    }
}

// end of file
