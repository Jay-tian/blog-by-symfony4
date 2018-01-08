<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class DefaultController extends BaseController
{
    public function index()
    {
        $users = $this->container->get('App\Dao\User\UserDao')->search(array(), array(), 0, 10);
        var_dump( $users );
        exit;
    }
}