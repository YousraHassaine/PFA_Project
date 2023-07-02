<?php

namespace App\Controller;

use App\Repository\SpecialityRepository;
use App\Repository\SubscriptionRepository;
use App\Repository\DoctorRepository;
use App\Repository\InfosRepository;
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
    #[Route('/Doctor/register', name: 'registerDoctor')]
    public function register(): Response
    {
        return $this->render('doctor/register.html.twig');
    }

    #[Route('/Doctor/fintrouverDoctord', name: 'trouveDoctor')]
    public function trouverDoctor(): Response
    {
        return $this->render('doctor/trouverDoctor.html.twig');
    }


    /**
     * action to get all specialities
     * 
     * @param SpecialityRepository $specialityRepository
     * 
     * @return Response
     */
    public function getDoctorsSpecialities(SpecialityRepository $specialityRepository): Response
    {
        $specialities = $specialityRepository->findAll();
       

        return $this->render('doctor/spec.html.twig',[
            "specialities" => $specialities
        ]);

    }
    public function getDoctorsSubscriptions(SubscriptionRepository $subscriptionRepository): Response
    {
            $subscriptions = $subscriptionRepository->findAll();
            return $this->render('doctor/subsc.html.twig',[
                "subscriptions" => $subscriptions
            ]);
    }


    #[Route('/doctor/detail/{id}', name: 'detail')]
    public function getDoctorDetail(int $id, DoctorRepository $DoctorRepository): Response
    {
        $Details = $DoctorRepository->find($id);
    
        return $this->render('doctor/detail.html.twig',[
            "Details" => $Details
        ]);

    }

}
