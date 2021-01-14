<?php

namespace spark\Models;

use \spark\Core\Model as Model;

use \R as R;

class PageModel extends Model
{
    /**
     * gets a page by its slug, returns an array of stdClass Obj
     *
     * @param string $slug
     * @return array $page
     */
    public static function getPageBySlug($slug = '') {
        $page = file_get_contents('https://control.mpu.com.au/wp-json/wp/v2/pages?slug=' . $slug);
        $page = json_decode($page);

        return $page;
    }
}

// end of file
