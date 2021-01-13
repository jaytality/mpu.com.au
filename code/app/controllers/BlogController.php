<?php

// Controller: Home

namespace spark\Controllers;

use \spark\Core\Controller as Controller;

use \spark\Models\BlogModel;

use \R as R;

class BlogController extends Controller
{
    function category($slug)
    {
        // get category from $category (slug)
        $category = BlogModel::getCategoryFromSlug($slug);

        if (empty($category)) {
            die ('error retrieving category');
        }

		$this->viewOpts['page']['layout']  = 'default';
        $this->viewOpts['page']['content'] = 'blog/category';
        $this->viewOpts['page']['section'] = 'sections';
        $this->viewOpts['page']['title']   = 'Blog';

        $this->viewData['category'] = $category;
        $this->viewData['posts'] = BlogModel::getCategoryPosts($category->id);

        $this->view->load($this->viewOpts, $this->viewData);
    }
}

