<?php
    namespace App;

    class Page
    {
        protected $view;
        
        protected $core;
        
        public function __construct($core)
        {
            $this->core = $core;
        }
        
        public function run($action)
        {
            $action = 'action_'.$action;

            if(!method_exists($this, $action))
                throw new \Exception("Method {$action} doesn't exist in ".get_class($this));

            $this->before();
            $this->$action();
            $this->after();
        }
        
        public function before()
        {
            $user = $this->user();
            if($this->core->url() != '/login' && !$user->logged())
                $this->core->redirect('/login');
            $this->view = new View('Template', $this->core);
        }
        
        public function after()
        {
            echo $this->view->render();
        }
        
        public function user()
        {
            $user = $this->core->session->get('who_am_i');
            if($user)
                return $user;
            else
                return false;
        }
        
        public function db()
        {
            return $this->core->db;
        }
        
        public function post($name, $default = NULL)
        {
            return Core::post($name, $default);
        }
    }
