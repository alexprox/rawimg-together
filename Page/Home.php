<?php

    namespace Page;

    class Home extends \App\Page
    {
        public function action_home()
        {
            $this->view->subview = 'Content/Home';
        }
    }
