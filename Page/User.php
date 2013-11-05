<?php

    namespace Page;

    class User extends \App\Page
    {
        public function action_login()
        {
            $error = false;
            if($this->user()->logged())
                $this->core->redirect('/');
            $login = trim($this->post('login', ''));
            if($login != '')
            {
                $pass = $this->post('password', false);
                if($pass)
                {
                    $sql = 'SELECT ID, Pwd, Salt, Status '
                           .' FROM access_users '
                           .'WHERE login = :login; ';
                    $query = $this->db()->query($sql);
                    $result = $query->bind('login', $login, true)->execute();
                    if(count($result) != 0)
                    {
                        if($this->user()->pwd_encode($pass, $result['Salt']) == $result['Pwd'])
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
                else
                    $error = 'login error 4';
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
