<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function index()
    {
        $number = mt_rand(0, 100);
 $em = $this->getDoctrine()->getManager()->getConnection();
 var_dump( $em->fetchAll('select * from user') );
 exit;
        return $this->render('index.html.twig', array(
            'number' => $number,
        ));
    }
}