<?php

namespace App;

class Session {

    static private function check() {
        if (!session_id()) {
            session_name('pen');
            session_start();
        }
    }

    static public function reset() {
        self::check();
        $_SESSION = array();
    }

    public function get($key, $default = NULL) {
        self::check();
        return Core::arr($_SESSION, $key, $default);
    }

    public function set($key, $val) {
        self::check();
        $_SESSION[$key] = $val;
    }

    public function remove($key) {
        self::check();

        if (!isset($_SESSION[$key]))
            return;

        $val = $_SESSION[$key];
        unset($_SESSION[$key], $val);
    }

}