<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LoginController  extends AbstractController
{
    /**
     * @Route("/")
     */
    public function index(): Response
    {
     
        return $this->render('auth/login.html.twig');

    }
} 