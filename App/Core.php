<?php
    namespace App;

    class Core
    {
        private $headers = array(
            'Content-Type: text/html; charset=utf-8'
        );
        
        private $config_folder = 'App';
        
        private $router;
        
        private $debug;
        
        public $db;
        
        public $session;
        
        public function __construct()
        {
            $this->debug = new \App\Debug($this);
            try
            {
                $this->router = new \App\Router($this);
                $this->db = new \App\Database($this);
                $this->session = new \App\Session();
                $user = $this->session->get('who_am_i', false);
                if(!$user)
                    $this->session->set('who_am_i', new \App\User());
            }
            catch(\Exception $e)
            {
                $this->debug->render_exceptions($e);
            }
        }
        
        public function config_folder()
        {
            return $this->config_folder;
        }
        
        static public function arr($arr, $name, $default = NULL)
        {
            if(isset($arr[$name]))
                return $arr[$name];
            else
                return $default;
        }
        
        static public function get($name, $default = NULL)
        {
            return self::arr($_GET, $name, $default);
        }
        
        static public function post($name, $default = NULL)
        {
            return self::arr($_POST, $name, $default);
        }
        
        static public function server($name, $default = NULL)
        {
            return self::arr($_SERVER, $name, $default);
        }
        
        static public function ajax()
        {
            return strtolower(self::server('HTTP_X_REQUESTED_WITH','')) == 'xmlhttprequest';
        }
        
        static public function url($with_domain = false, $with_params = false)
        {
            $url = '';
            if(!!$with_domain)
            {
                $url .= self::server('HTTPS') == 'on' ? 'https://':'http://';
                $url .= self::server('HTTP_HOST');
            }
            $url .=self::server('REQUEST_URI');

            if(!$with_params)
            {
                $pos = strpos($url, '?');
                if ($pos !== false)
                    $url = substr($url, 0, $pos);
            }
            return $url;
        }
        
        public function redirect($url)
        {
            $this->headers[] = 'Location: '.$url;
        }
        
        public function execute()
        {
            try
            {
                $to_run = $this->router->match(self::url());
                $to_run['Controller']->run($to_run['Action']);
                $this->send_headers();
            }
            catch(\Exception $e)
            {
                $this->debug->render_exceptions($e);
            }
        }
        
        public function send_headers()
        {
            foreach($this->headers as $header)
                header($header);
            return $this;
        }
        
        public static function explode($delimiter, $array)
        {
            $new = array();
            $tmp = explode($delimiter, $array);
            foreach($tmp as $t)
                if(trim($t) != '')
                    $new[] = $t;
            return $new;
        }
    }
