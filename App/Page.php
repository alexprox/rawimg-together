<?php

namespace App;

class Page {

    /**
     * @var \App\View 
     */
    protected $view;

    /**
     * @var \App\Core 
     */
    protected $core;

    public function __construct($core) {
        $this->core = $core;
    }

    public function run($action, $params, $prefix = false) {
        if (!$prefix) {
            $action = 'action_' . $action;
        }
        if (!method_exists($this, $action)) {
            throw new \Exception("Method {$action} doesn't exist in " . get_class($this));
        }
        $this->before();
        call_user_func_array(array($this, $action), $params);
        $this->after();
    }

    public function before() {
        if ($this->core->router->get_current_route()->is_secured() && !$this->user()->logged()) {
            $this->core->redirect('/');
        }
        if ($this->user()->logged() && $this->user()->idle() > 120) {
            $this->core->redirect('/logout');
        }
        $this->view = new View('Template', $this->core);
    }

    public function after() {
        if ($this->user()) {
            $this->user()->update();
            echo '<pre>';
            echo $this->currnet_route();
            echo '<br>';
            echo $this->core->router->get_current_route()->is_secured()?'secured':'unsecured';
            echo '<br>';
            echo $this->user()->logged()?'logged':'unlogged';
            echo '</pre>';
        }
        $this->core->send_headers();
        echo $this->view->render();
    }

    /**
     * @return \App\User
     */
    public function user() {
        return $this->core->user();
    }

    /**
     * @return \App\Database
     */
    public function db() {
        return $this->core->db;
    }

    public function post($name, $default = NULL) {
        return Core::post($name, $default);
    }

    public function currnet_route() {
        return $this->core->router->get_current_route()->name();
    }

}
