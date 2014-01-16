<?php

namespace App;

class Router {

    private $core;
    private $routes;
    private $config = '_Router.php';
    private $current_route;

    public function __construct($core) {
        if (file_exists(root() . '\\' . $core->config_folder() . '\\' . $this->config)) {
            $this->routes = include(root() . '\\' . $core->config_folder() . '\\' . $this->config);
            foreach ($this->routes as $name => &$route) {
                $route = new Route($name, $route[0], $route[1][0], $route[1][1], $route[2]);
            }
        } else {
            throw new \Exception('File "' . root() . '\\' . $core->config_folder() . '\\' . $this->config . '" not found');
        }
        $this->core = $core;
    }

    public function match($current_url) {
        $current_url = Core::explode('/', $current_url);
        foreach ($this->routes as $route) {
            $url = Core::explode('/', $route->url());
            if ($current_url == $url) {
                return $this->set_current_route($route);
            }
            $params = array();
            $matched = 0;
            foreach ($url as $k => $part) {
                if (isset($current_url[$k]) && preg_match('/^{([a-z]+)}$/', $part)) {
                    $params[] = $current_url[$k];
                    $matched++;
                } elseif (isset($current_url[$k]) && $current_url[$k] == $part) {
                    $matched++;
                }
                if ($matched == count($url) && count($url) == count($current_url)) {
                    return $this->set_current_route($route, $params);
                }
            }
        }
        throw new NotFoundException('No route matched your request');
    }

    public function generate_url($name, $params) {
        if (isset($this->routes[$name])) {
            $url = $this->routes[$name]->url();
            foreach ($params as $param => $value) {
                $url = str_replace('{' . $param . '}', $value, $url);
            }
            return $url;
        } else {
            throw new \Exception('No route matched your request');
        }
    }

    /**
     * @return \App\Route 
     */
    public function get_current_route() {
        return $this->current_route;
    }
    
    /**
     * @return \App\Route 
     */
    private function set_current_route($route, $params = array()) {
        $route->add_params($params);
        $this->current_route = $route;
        return $this->current_route;
    }
}