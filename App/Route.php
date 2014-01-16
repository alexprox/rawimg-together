<?php

namespace App;

class Route {

    private $name;
    private $url;
    private $controller;
    private $action;
    private $params;
    private $secured;

    public function __construct($name, $url, $controller, $action, $secured = false) {
        $this->name = $name;
        $this->url = $url;
        $this->controller = '\\Page\\' . $controller;
        $this->action = $action;
        $this->secured = !!$secured;
    }

    public function name() {
        return $this->name;
    }

    public function url() {
        return $this->url;
    }

    public function controller() {
        return $this->controller;
    }

    public function action() {
        return $this->action;
    }
    
    public function params() {
        return $this->params;
    }
    
    public function add_params($params) {
        $this->params = $params;
    }
    
    public function is_secured() {
        return $this->secured;
    }

}