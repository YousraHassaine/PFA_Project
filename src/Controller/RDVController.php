<?php

namespace App\Controller;

use App\Entity\Appointment;
use App\Entity\Patient;
use App\Repository\AppointmentRepository;
use App\Repository\PatientRepository;
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

    #[Route('/rdv', name: 'rdv_index')]
        public
        function index(SessionInterface $session, AppointmentRepository $appointmentRepository): Response
        {

            if ($session->has('patient_id')) {

                $patientId = $session->get('patient_id');
                $patientId = $session->get('patient_id');
                $appointments = $this->entityManager->getRepository(Appointment::class)->findBy(['Patient' => $patientId]);
                return $this->render('rdv/index.html.twig', [
                    'appointments' => $appointments,
                ]);
            }

            return $this->render('Patient/login.html.twig');
        }

    #[Route('/rdv/Add', name: 'rdvCreate')]
    public
    function AddRdvForm(SessionInterface $session): Response
    {

        if ($session->has('patient_id')) {
         return $this->render('rdv/create.html.twig');
        }

        return $this->render('Patient/login.html.twig');
    }


}
