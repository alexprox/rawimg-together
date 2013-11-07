<?php
    namespace App;

    class View
    {
        private $name;
        
        private $file;
        
        private $ext = '.php';
        
        private $folder = 'View';
        
        private $_data = array();
        
        public function __construct($name, $core)
        {
            $this->folder = dirname(__DIR__).'\\'.$this->folder;
            $this->name = $name;
            $this->file = $name.$this->ext;
            if(!file_exists($this->folder.'\\'.$this->file))
                throw new \Exception("View ".$name." not found.");
            
            $this->_data['url'] = Core::url();
            $this->_data['core'] = $core;
            $this->_data['navbar'] = true;
            $this->_data['footer'] = true;
            $this->_data['full_bootstrap'] = true;
        }
        
        public function __get($name)
        {
            if(isset($this->_data[$name]))
                return $this->_data[$name];
            throw new \Exception("Value ".$name." not set for view {$this->name}");
        }
        
        public function __set($name, $value)
        {
            $this->_data[$name] = $value;
        }
        
        public function render()
        {
            extract($this->_data);
            ob_start();
            include($this->folder.'\\'.$this->file);
            return ob_get_clean();
        }
    }
