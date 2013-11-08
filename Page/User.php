<?php

    namespace Page;

    class User extends \App\Page
    {
        public function action_login()
        {
            $this->view->navbar = false;
            $error = false;
            if($this->user()->logged())
                $this->core->redirect('/');
            $login = trim($this->post('login', ''));
            if($login != '')
            {
                $pass = $this->post('password', false);
                if($pass)
                {
                    $sql = 'SELECT ID, Status '
                           .' FROM access_users '
                           .'WHERE login = :login '
                           .'  AND access_pwd_encode(:plain_pass, Salt)=Pwd;';
                    $query = $this->db()->query($sql);
                    $result = $query->bind('login', $login, true)
                            ->bind('plain_pass', $pass, true)
                            ->execute();
                    if(count($result) != 0)
                    {
                        if($result['Status'] == 0)
                        {
                            $this->user()->login($result['ID']);
                            $this->core->redirect('/');
                        }
                        else
                            $error = 'login error 3';
                    }
                    else
                        $error = 'login error 2';
                }
                else
                    $error = 'login error 1';
            }
            $this->view->error = $error;
            $this->view->subview = 'User/Login';
        }
        
        public function action_logout()
        {
            $this->user()->logout();
            $this->core->redirect('/');
        }
    }
