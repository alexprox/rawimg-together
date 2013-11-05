<?php
    namespace App;

    class Router
    {
        private $core;
        
        private $routes;
        
        private $config = '_Router.php';
        
        public function __construct($core)
        {
            if(file_exists(root().'\\'.$core->config_folder().'\\'.$this->config))
                $this->routes = include(root().'\\'.$core->config_folder().'\\'.$this->config);
            else
                throw new \Exception('File "'.root().'\\'.$core->config_folder().'\\'.$this->config.'" not found');
            $this->core = $core;
        }
        
        public function match($url)
        {
            foreach($this->routes as $route => $to_run)
            {
                $to_run[0] = '\\Page\\'.$to_run[0];
                if('/'.$route == $url)
                    return array('Controller'=>new $to_run[0]($this->core), 'Action'=>$to_run[1]);
            }
            throw new \Exception('No route matched your request');
        }
    }