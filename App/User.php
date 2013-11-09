<?php
    namespace App;

    class User
    {
        private $user_id;
        
        private $session_id;
        
        private $logged = false;
        
        public function __construct()
        {
            $this->session_id = session_id();
        }
        
        public function id()
        {
            return $this->user_id;
        }
        
        public function login($uid)
        {
            $this->user_id = $uid;
            $this->logged = true;
        }
        
        public function logged()
        {
            return $this->logged;
        }
        
        public function logout()
        {
            $this->logged = false;
            Session::reset();
        }
    }
