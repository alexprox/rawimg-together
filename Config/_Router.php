<?php

return array(
    /*
    'route_name' => array(
        '/url/{id}', array('Controller', 'action'), $is_secured_bool
    ),
     */
    'home' => array(
        '/', array('Home', 'home'), false
    ),
    
    'admin_login' => array(
        '/login', array('User', 'login'), false
    ),
    'admin_logout' => array(
        '/logout', array('User', 'logout'), true
    ),
    'admin_posts' =>  array(
        '/admin/posts', array('Admin', 'posts_list'), true
    ),
);