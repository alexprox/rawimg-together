<?php

namespace App;

class Debug {

    private $core;
    public $vars = array();

    public function __construct($core) {
        $this->core = $core;
    }

    /**
     * @param \Exception $exception
     */
    public function render_exceptions($exception) {
        $status = '503 Service Temporarily Unavailable';
        $err = 'Service Temporarily Unavailable';
        if ($exception instanceof NotFoundException) {
            $status = '404 Not Found';
            $err = 'Page not found. Sorry';
        }
        header($_SERVER["SERVER_PROTOCOL"] . ' ' . $status);
        header("Status: " . $status);

        $view = new View('Template', $this->core);
        $view->subview = 'Exception';
        if ($this->core->user()->is_granted('ADMIN')) {
            $view->debug_err = $exception->getMessage();
            $view->debug_trace = $exception->getTraceAsString();
        } else {
            $view->debug_err = $err;
        }
        echo $view->render();
    }
    
    public function debug($var) {
        $this->vars[] = $var;
    }

    public function render_vars() {
        if (count($this->vars) != 0) {
            echo '<pre>';
            foreach ($this->vars as $debug_value) {
                var_dump($debug_value);
            }
            echo '</pre>';
        }
    }
}