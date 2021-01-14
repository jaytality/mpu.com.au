<?php

namespace spark\Models;

use \spark\Core\Model as Model;

use \R as R;

class BlogModel extends Model
{
    public static function getPosts($limit = 10)
    {
        $posts = file_get_contents('https://control.mpu.com.au/wp-json/wp/v2/posts?per_page=' . $limit);
        $posts = json_decode($posts);

        return $posts;
    }

    public static function getCategories() {
        $categories = file_get_contents('https://control.mpu.com.au/wp-json/wp/v2/categories');
        $categories = json_decode($categories);

        return $categories;
    }

    public static function getCategoryFromSlug($slug) {
        $categories = self::getCategories();

        foreach ($categories as $category) {
            if ($category->slug == $slug) {
                return $category;
            }
        }

        return null;
    }

    public static function getCategoryPosts($id = 0) {
        $posts = file_get_contents('https://control.mpu.com.au/wp-json/wp/v2/posts?categories=' . $id);
        $posts = json_decode($posts);

        return $posts;
    }

    public static function getFeaturedMediaUrl($id = 0) {
        $image = file_get_contents('https://control.mpu.com.au/wp-json/wp/v2/media/' . $id);
        $image = json_decode($image);

        return $image;
    }
}

// end of file
