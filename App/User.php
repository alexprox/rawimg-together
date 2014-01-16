<?php

namespace App;

class User {

    private $user_id;
    private $session_id;
    private $logged = false;
    private $updated;
    private $roles = array();

    public function __construct() {
        $this->session_id = session_id();
        $this->updated = time();
    }

    public function id() {
        return $this->user_id;
    }

    public function login($uid) {
        $this->user_id = $uid;
        $this->logged = true;
        $this->roles[] = 'ADMIN';
    }

    public function logged() {
        return $this->logged;
    }

    public function logout() {
        $this->logged = false;
        Session::reset();
    }

    public function idle() {
        return ceil((time() - $this->updated)/60);
    }

    public function update() {
        $this->updated = time();
    }
    
    public function is_granted($role) {
        return !!in_array($role, $this->roles);
    }

}
