<?php

// Controller: Page
// designed so individual routes can call specific pages from
// wordpress

namespace spark\Controllers;

use \spark\Core\Controller as Controller;

use \spark\Models\HomeModel;
use \spark\Models\PageModel;

use \R as R;

class PageController extends Controller
{
    function page($slug = '')
    {
        $page = PageModel::getPageBySlug($slug);
        $page = (!empty($page)) ? $page[0] : null;
        $this->viewData['page'] = $page;

        $this->viewOpts['page']['layout']  = 'default';

        if (empty($page)) {
            $home = new \spark\Controllers\HomeController;
            $home->index();
        } else {
            $this->viewOpts['page']['content'] = 'home/page';

            $this->viewOpts['page']['section'] = 'sections';
            $this->viewOpts['page']['title']   = $page->title->rendered;

            $this->view->load($this->viewOpts, $this->viewData);
        }
    }
}

