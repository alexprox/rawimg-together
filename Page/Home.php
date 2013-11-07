<?php

    namespace Page;

    class Home extends \App\Page
    {
        public function action_home()
        {
            $this->view->subview = 'Content/Drawer';
            $this->view->footer = false;
            $this->view->navbar = false;
            $this->view->full_bootstrap = false;
            $this->view->drawer = '';
        }
    }
