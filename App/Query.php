<?php
    namespace App;

    class Query
    {
        const STR = \PDO::PARAM_STR;
        const INT = \PDO::PARAM_INT;
        
        private $connection;
        
        private $sql;
        
        private $sth;
        
        private $use_transaction = false;
        
        public function __construct(&$connection, $sql)
        {
            $this->connection = $connection;
            if(preg_match('/(UPDATE|INSERT)/', $this->sql))
                $this->use_transaction = true;
            $this->sql = preg_replace('!\s+!', ' ', $sql);
            $this->sth = $this->connection->prepare($this->sql);
        }
        
        public function bind($name, $value, $is_string = false)
        {
            if(!!$is_string)
                $this->sth->bindValue(':'.$name, $value, \PDO::PARAM_STR);
            else
                $this->sth->bindValue(':'.$name, $value, \PDO::PARAM_INT);
            return $this;
        }
        
        public function execute()
        {
            try
            {
                if($this->use_transaction)
                    $this->connection->beginTransaction();
                $result = $this->sth->execute();
                if($this->need_to_fetch())
                    $result = $this->fancy_fetch();
                if($this->use_transaction)
                    $this->connection->commit();
                return $result;
            }
            catch (\Exception $e)
            {
                if($this->use_transaction)
                    $this->connection->rollBack();
                throw $e;
            }
        }
        
        private function need_to_fetch()
        {
            $temp = Core::explode(' ', $this->sql);
            return strtolower($temp[0]) == 'select';
        }
        
        private function fancy_fetch()
        {
            $data = $this->sth->fetchAll(\PDO::FETCH_ASSOC);
            if(count($data) == 1)
            {
                if(count($data[0]) == 1)
                    return $data[0][key($data[0])];
                return $data[0];
            }
            return $data;
        }
        
    }