<?php
    namespace App;

    class Debug
    {
        /**
         * @param \Exception $exception
         */
        public function render_exceptions($exception)
        {
            $status = '503 Service Temporarily Unavailable';
          
            if($exception instanceof NotFoundException)
                $status = '404 Not Found';
              
            header($_SERVER["SERVER_PROTOCOL"].' '.$status);
            header("Status: ".$status);
            
            echo $exception->getMessage();
            echo '<pre>';
            echo $exception->getTraceAsString();
            echo '</pre>';
        }
    }

