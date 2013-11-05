<?php

    namespace Page;

    class Home extends \App\Page
    {
        public function action_home()
        {
            $this->view->subview = 'Content/Home';
            //$out = $this->db()->query('SELECT :id as text;')->bind('id',1)->execute();
            //var_dump(preg_match('/(UPDATE|INSERT)/', 'INSERT Va INTO'));
        }
    }
