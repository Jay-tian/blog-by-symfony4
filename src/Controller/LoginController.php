<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class LoginController extends BaseController
{
    public function login()
    {
        $userDao = $this->getUserDao();
        $users = $userDao->search(array(), array(), 0, 10);

        return $this->render('login/index.html.twig');
    }

    public function register()
    {
        $userDao = $this->getUserDao();
        $users = $userDao->search(array(), array(), 0, 10);

        return $this->render('index.html.twig');
    }

    protected function getUserDao()
    {
        return $this->getDao('User\UserDao');
    }
}