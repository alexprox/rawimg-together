<?php

namespace App;

class User {

    private $user_id;
    private $session_id;
    private $logged = false;
    private $updated;

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
    }

    public function logged() {
        return $this->logged;
    }

    public function logout() {
        $this->logged = false;
        Session::reset();
    }

    public function idle() {
        return time() - $this->updated;
    }

    public function update() {
        $this->updated = time();
    }

}
