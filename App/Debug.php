<?php
    namespace App;

    class Debug
    {
        public function render_exceptions($exception)
        {
            echo $exception->getMessage();
            echo '<pre>';
            echo $exception->getTraceAsString();
            echo '</pre>';
        }
    }

