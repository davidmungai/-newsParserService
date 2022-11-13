<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LoginController  extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function number(): Response
    {
     $error='';
     
        return $this->render('auth/login.html.twig',[
            'error'=>$error

        ]);

    }
}