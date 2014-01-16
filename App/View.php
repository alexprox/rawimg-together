<?php

namespace App;

class View {

    private $core;
    private $name;
    private $file;
    private $ext = '.php';
    private $folder = 'View';
    private $_data = array();
    private $execute = true;
    private $body = '';

    public function __construct($name, $core) {
        $this->core = $core;
        $this->folder = dirname(__DIR__) . '\\' . $this->folder;
        $this->name = $name;
        $this->file = $name . $this->ext;
        if (!file_exists($this->folder . '\\' . $this->file))
            throw new \Exception("View " . $name . " not found.");

        $this->_data['user'] = $core->user();
        $this->_data['route'] = $core->router->get_current_route();
        $this->_data['url'] = Core::url();
        $this->_data['core'] = $core;
    }

    public function __get($name) {
        if (isset($this->_data[$name]))
            return $this->_data[$name];
        throw new \Exception("Value " . $name . " not set for view {$this->name}");
    }

    public function __set($name, $value) {
        $this->_data[$name] = $value;
    }

    public function json($value) {
        $this->execute = false;
        $this->body = json_encode($value);
    }
    
    public function json_redirect($value) {
        $this->execute = false;
        $this->body = json_encode($value);
    }
    
    public function json_msg($value) {
        $this->execute = false;
        $this->body = json_encode($value);
    }

    public function image($content) {
        $this->core->add_header('Content-type: image/png');
        $this->execute = false;
        $this->body = $content;
    }

    public function render() {
        if ($this->execute) {
            $this->core->add_header('Content-Type: text/html; charset=utf-8');
            extract($this->_data);
            ob_start();
            include($this->folder . '\\' . $this->file);
            $this->body = ob_get_clean();
        }
        return $this->body;
    }

    public function have_pagination($pages_url, $pages, $page) {
        $this->_data['pages_url'] = $pages_url;
        $this->_data['pages'] = $pages;
        $this->_data['page'] = $page;
    }

}
