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
    }
