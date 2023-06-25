<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DoctorController extends AbstractController
{
    #[Route('/doctor', name: 'app_doctor')]
    public function index(): Response
    {
        return $this->render('doctor/index.html.twig');
    }

    #[Route('/Doctor/login', name: 'loginDoctor')]
    public function login(): Response
    {
        return $this->render('doctor/login.html.twig');
    }

    #[Route('/Doctor/finTrouverDoctord', name: 'TrouveDoctor')]
    public function TrouverDoctor(): Response
    {
        return $this->render('doctor/TrouverDoctor.html.twig');
    }
}
