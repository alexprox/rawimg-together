<?php
    namespace App;

    class Debug
    {
        /**
         * @param \Exception $exception
         */
        public function render_exceptions($exception)
        {
            echo $exception->getMessage();
            echo '<pre>';
            echo $exception->getTraceAsString();
            echo '</pre>';
        }
    }

