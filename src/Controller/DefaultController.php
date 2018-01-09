<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class DefaultController extends BaseController
{
    public function index()
    {
        $userDao = $this->getUserDao();
        $users = $userDao->search(array(), array(), 0, 10);
        var_dump( $users );
        exit;
    }

    protected function getUserDao()
    {
        return $this->getDao('User\UserDao');
    }
}