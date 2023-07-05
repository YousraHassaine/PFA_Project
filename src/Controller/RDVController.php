<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RDVController extends AbstractController
{
    #[Route('/r/d/v', name: 'app_r_d_v')]
    public function index(): Response
    {
        return $this->render('rdv/index.html.twig', [
            'controller_name' => 'RDVController',
        ]);
    }
}
