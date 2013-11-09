<?php

    namespace Page;

    class Home extends \App\Page
    {
        public function action_home()
        {
            $this->view->subview = 'Content/Home';
            $sql = 'SELECT ImageID as ID, Created '
                .'    FROM access_users_images '
                .'   WHERE UserID = :user '
                .'ORDER BY Created DESC '
                .'   LIMIT 4;';
            $images = $this->db()->query($sql)
                    ->bind('user', $this->user()->id())
                    ->execute();
            if(isset($images['ID']))
                $images = array($images);
            $this->view->images = $images;
        }
    }
