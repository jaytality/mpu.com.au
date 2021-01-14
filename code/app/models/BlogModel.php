<?php

namespace spark\Models;

use \spark\Core\Model as Model;

use \R as R;

class BlogModel extends Model
{
    /**
     * get the details of an author by their $id
     *
     * @param integer $id
     * @return array $author
     */
    public static function getAuthorById($id = 0) {
        $author = file_get_contents('https://control.mpu.com.au/wp-json/wp/v2/users/' . $id);
        $author = json_decode($author);

        return $author;
    }

    /**
     * get posts available (all categories) from wordpress - default limit of posts is 10,
     * but customisable as needed
     *
     * @param integer $limit
     * @return array $posts
     */
    public static function getPosts($limit = 10)
    {
        $posts = file_get_contents('https://control.mpu.com.au/wp-json/wp/v2/posts?per_page=' . $limit);
        $posts = json_decode($posts);

        return $posts;
    }

    /**
     * fetch a wordpress post and details by $id
     *
     * @param integer $id
     * @return array $post
     */
    public static function getPost($id = 0)
    {
        $post = file_get_contents('https://control.mpu.com.au/wp-json/wp/v2/posts/' . $id);
        $post = json_decode($post);

        return $post;
    }

    /**
     * get a list of categories available from wordpress
     *
     * @return array $categories
     */
    public static function getCategories() {
        $categories = file_get_contents('https://control.mpu.com.au/wp-json/wp/v2/categories');
        $categories = json_decode($categories);

        return $categories;
    }

    /**
     * fetch the details of a category by $id from wordpress
     *
     * @param integer $id
     * @return array $category
     */
    public static function getCategoryById($id = 0) {
        $category = file_get_contents('https://control.mpu.com.au/wp-json/wp/v2/categories/' . $id);
        $category = json_decode($category);

        return $category;
    }

    /**
     * using the $slug string, fetch the details of a wordpress category
     *
     * @param string $slug
     * @return array $category
     */
    public static function getCategoryFromSlug($slug) {
        $categories = self::getCategories();

        foreach ($categories as $category) {
            if ($category->slug == $slug) {
                return $category;
            }
        }

        return null;
    }

    /**
     * gets posts within a given category $id from wordpress
     *
     * @param integer $id
     * @return array $posts
     */
    public static function getCategoryPosts($id = 0) {
        $posts = file_get_contents('https://control.mpu.com.au/wp-json/wp/v2/posts?categories=' . $id);
        $posts = json_decode($posts);

        return $posts;
    }

    /**
     * gets details about a media item based on $id of the media
     *
     * @param integer $id
     * @return array $image
     */
    public static function getFeaturedMediaUrl($id = 0) {
        $image = file_get_contents('https://control.mpu.com.au/wp-json/wp/v2/media/' . $id);
        $image = json_decode($image);

        return $image;
    }
}

// end of file
