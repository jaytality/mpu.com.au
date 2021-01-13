<?php

namespace spark\Models;

use \spark\Core\Model as Model;

use \R as R;

class AboutModel extends Model
{
    public static function create($data)
    {
        $newRecord = R::xdispense('tbl_records');
        $newRecord['time'] = time();
        $newRecord['message'] = "Hello";
        R::store($newRecord);
    }
}

// end of file
