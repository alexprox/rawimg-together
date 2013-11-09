<?php

    namespace Page;

    class Sketch extends \App\Page
    {
        public function action_new()
        {
            $this->view->only_drawer('new');
            $type = $this->post('drawer', false);
            if($type && $type == 'new')
            {
                $image = $this->post('image', false);
                if($image)
                {
                    $sql = 'INSERT INTO proto_images '
                        .'              (Image) '
                        .'       VALUES (:Image); '
                        .'       INSERT INTO access_sketches'
                        .'              (ImageID, UserID) '
                        .'       VALUES (LAST_INSERT_ID(), :User); ';
                    $query = $this->db()->query($sql);
                    $query->bind('User', $this->user()->id())
                            ->bind('Image', base64_decode(substr($image, strpos($image, ",")+1)), \App\Query::BLOB)
                            ->execute();
                    $this->view->json('ok');
                }
            }
        }
        
        public function action_get($image_id)
        {
            $sql = 'SELECT Image '
                .'    FROM access_users_images '
                .'   WHERE ImageID = :image '
                .'     AND UserID = :user;';
            $image = $this->db()->query($sql)
                    ->bind('image', $image_id)
                    ->bind('user', $this->user()->id())
                    ->execute();
            if(empty($image))
                throw new \App\NotFoundException('Image not found');
            $this->view->image($image);
        }
        
        public function action_get_all($page = 1)
        {
            $per_page = 12;
            $page = intval($page);
            if($page < 1)
                $page = 1;
            $sql = 'SELECT COUNT(*) as Count'
                .'    FROM access_users_images '
                .'   WHERE UserID = :user; ';
            $count = $this->db()->query($sql)
                    ->bind('user', $this->user()->id())
                    ->execute();
            $this->view->have_pagination('/my/', intval(ceil($count/$per_page)), $page);
            $sql = 'SELECT ImageID as ID, Created '
                .'    FROM access_users_images '
                .'   WHERE UserID = :user '
                .'ORDER BY Created DESC '
                .'   LIMIT :from, :per_page;';
            $images = $this->db()->query($sql)
                    ->bind('user', $this->user()->id())
                    ->bind('from', ($page-1)*$per_page)
                    ->bind('per_page', $per_page)
                    ->execute();
            if(isset($images['ID']))
                $images = array($images);
            $this->view->subview = 'Content/MySketches';
            $this->view->images = $images;
        }
    }
