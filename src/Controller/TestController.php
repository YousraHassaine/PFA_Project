<?php

namespace App\Controller;

use App\Repository\AppointmentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{

    #[Route('/test', name: 'app_test')]
    public function index(AppointmentRepository $appointmentRepository): Response
    {
        $year = 2023; // Année souhaitée

        $results = $appointmentRepository->findAllGreaterThanPrice($year);

        // Affichage des résultats dans une vue
        return $this->render('test/index.html.twig', [
            'results' => $results,
            'year' => $year,
        ]);
    }





}
