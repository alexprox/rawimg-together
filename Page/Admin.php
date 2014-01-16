<?php

namespace Page;

class Admin extends \App\Page {

    public function action_posts_list() {
        
        $this->view->subview = 'Admin/Posts/List';
    }

}
