<?php

namespace Page;

class Admin extends \App\Page {

    public function action_home() {
        $this->debug('Hello admin!');
        $this->view->subview = 'Content/Home';
    }

}
