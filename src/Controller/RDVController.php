<?php

namespace App\Controller;

use App\Entity\Appointment;
use App\Entity\Patient;
use App\Repository\AppointmentRepository;
use App\Repository\DoctorRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class RDVController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    #[Route('/r/d/v', name: 'app_r_d_v')]
    public function index(SessionInterface $session,AppointmentRepository $appointmentRepository): Response
    {
        if ($session->has('patient_id')) {

                //$entityManager = $this->entityManager;
                $appointments = $appointmentRepository->findAll();
                dd($appointments);
                return $this->render('rdv/index.html.twig', [
                    'appointments' => $appointments,
                ]);
            }

        return $this->render('Patient/login.html.twig');
    }
}
