<?php

    namespace Page;

    class User extends \App\Page
    {
        public function action_login()
        {
            if($this->user()->logged())
                $this->core->redirect('/');
            if($this->post('login') == 'prox' && $this->post('password') == 'proxpass')
            {
                $this->user()->login();
                $this->core->redirect('/');
            }
            $this->view->subview = 'User/Login';
        }
        
        public function action_logout()
        {
            $this->user()->logout();
            $this->core->redirect('/');
        }
    }
