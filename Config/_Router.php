<?php

return array(
    'home' => array(
        '/', array('Home', 'home')
    ),
    'login' => array(
        '/login', array('User', 'login')
    ),
    'logout' => array(
        '/logout', array('User', 'logout')
    ),
    'pages' => array(
        '/pages/{page}', array('User', 'logout')
    )
);