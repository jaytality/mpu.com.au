<?php

// Controller: Home

namespace spark\Controllers;

use \spark\Core\Controller as Controller;

use \spark\Models\AboutModel;

use \R as R;

class AboutController extends Controller
{
    function index()
    {
		$this->viewOpts['page']['layout'] = 'default';
        $this->viewOpts['page']['content'] = 'about/index';
        $this->viewOpts['page']['section'] = 'info';
        $this->viewOpts['page']['title'] = 'About Us';

        $this->view->load($this->viewOpts, $this->viewData);
    }

    function history()
    {
		$this->viewOpts['page']['layout'] = 'default';
        $this->viewOpts['page']['content'] = 'about/history';
        $this->viewOpts['page']['section'] = 'info';
        $this->viewOpts['page']['title'] = 'History';

        $this->view->load($this->viewOpts, $this->viewData);
    }

    function staff()
    {
		$this->viewOpts['page']['layout'] = 'default';
        $this->viewOpts['page']['content'] = 'about/staff';
        $this->viewOpts['page']['section'] = 'info';
        $this->viewOpts['page']['title'] = 'Our Staff';

        $this->view->load($this->viewOpts, $this->viewData);
    }
}

