<?php

namespace App;

class Route {

    private $name;
    private $url;
    private $controller;
    private $action;
    private $params;

    public function __construct($name, $url, $controller, $action) {
        $this->name = $name;
        $this->url = $url;
        $this->controller = '\\Page\\' . $controller;
        $this->action = $action;
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

}