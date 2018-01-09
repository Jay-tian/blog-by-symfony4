<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BaseController extends Controller
{
    public function getService()
    {
        $this->container->get('App\Dao\User\UserDao')->search(array(), array(), 0, 10);
    }

    public function getDao($dao)
    {
        return $this->container->get('App\Dao\\'.$dao);
    }
}