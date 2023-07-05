<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    #[Route('/test', name: 'app_test')]
    public function index(SessionInterface $session): Response
    {
        if ($session->has('patient_id')) {
             return $this->render('test/index.html.twig', [
                      'controller_name' => 'TestController',
                    ]);
        } else {
            return $this->render('Patient/login.html.twig');
        }

    }
}
