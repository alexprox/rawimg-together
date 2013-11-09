<?php
    return array(
        '/' => array('Home', 'home'),
        '/login' => array('User', 'login'),
        '/logout' => array('User', 'logout'),
        
        '/new' => array('Sketch', 'new'),
        '/get/{imageid}' => array('Sketch', 'get'),
        '/my' => array('Sketch', 'get_all'),
        '/my/{page}' => array('Sketch', 'get_all'),
    );