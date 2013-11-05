<?php
    namespace App;

    class Database
    {
        const STR = \PDO::PARAM_STR;
        const INT = \PDO::PARAM_INT;
        
        private $connection;
        
        private $config = '_Database.php';
        
        public function __construct($core)
        {
            if(file_exists(root().'\\'.$core->config_folder().'\\'.$this->config))
                $config = include(root().'\\'.$core->config_folder().'\\'.$this->config);
            else
                throw new \Exception('File "'.root().'\\'.$core->config_folder().'\\'.$this->config.'" not found');
            $this->create_connection($config);
        }
        
        private function create_connection($config)
        {
            $keys = array('host', 'db_name', 'user', 'pass');
            foreach($keys as $key)
                if(!isset($config[$key]))
                    throw new \Exception('Configuration for creating database conncetion is wrong. Key '.$key.' is not found!');
            $this->connection = new \PDO("mysql:host=".$config['host'].";dbname=".$config['db_name'], $config['user'], $config['pass']);
            $this->connection->setAttribute(\PDO::MYSQL_ATTR_INIT_COMMAND, \PDO::ERRMODE_EXCEPTION);
            $this->connection->exec("SET NAMES 'UTF-8';");
        }
        
        public function query($sql)
        {
            return new Query($this->connection, $sql);
        }
    }