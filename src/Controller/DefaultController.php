<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class DefaultController extends BaseController
{
    public function index()
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