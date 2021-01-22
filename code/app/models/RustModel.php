<?php

namespace spark\Models;

use \spark\Core\Model as Model;

use \R as R;

class RustModel extends Model
{
    public static function getSoloPlayerStats()
    {
        $soloplayers = R::getAll('SELECT * FROM rust_solos WHERE name IS NOT NULL');
        return $soloplayers;
    }
}

// end of file
