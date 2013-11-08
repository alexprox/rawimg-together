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
            $url = explode('/', $url);
            foreach($this->routes as $route => $to_run)
            {
                $to_run[0] = '\\Page\\'.$to_run[0];
                $route = explode('/', $route);
                $params = array();
                $matched = 0;
                foreach($route as $k => $part)
                {
                    if(preg_match('/^{([a-z]+)}$/', $part))
                    {
                        $params[] = $url[$k];
                        $matched++;
                    }
                    elseif(isset($url[$k]) && $url[$k] == $part)
                    {
                        $matched++;
                    }
                    if($matched == count($route))
                    {
                        return array(
                            'Controller' => new $to_run[0]($this->core),
                            'Action' => $to_run[1],
                            'Params' => $params
                        );
                    }
                }
            }
            throw new NotFoundException('No route matched your request');
        }
    }