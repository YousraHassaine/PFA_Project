<?php

namespace App\Controller;

use App\Entity\Doctor;
use App\Entity\Speciality;
use App\Entity\Subscription;
use App\Repository\SpecialityRepository;
use App\Repository\SubscriptionRepository;
use App\Repository\DoctorRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class DoctorController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
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
    #[Route('/Doctor/register', name: 'registerDoctorForm')]
    public function registerForm(): Response
    {

        return $this->render('doctor/register.html.twig');
    }
    #[Route('/Doctor/Insrire', name: 'registerDoctor',methods: "POST")]
    public function register(Request $request): Response
    {
        //dd($request);
        $doctor=new Doctor();
        $doctor->setNom($request->request->get("nom"));
        $doctor->setCIN("FRRRRR");
        $doctor->setAdresse("RRRR");
        $doctor->setVille("oujda");
        $doctor->setPrenom($request->request->get("prenom"));
        $doctor->setTel($request->request->get("telephone"));
        $doctor->setEmail($request->request->get("email"));

        $doctor->setSexe($request->request->get("sexe"));
        $doctor->setLogin($request->request->get("Login"));
        $doctor->setPassword($request->request->get("password"));
        $doctor->setPhotp("user.jpg");
        $doctor->setDisponibilite(false);

        $SubscriptionId=$request->request->get("subscription");

        $SpecialtyId=$request->request->get("speciality");
        $entityManage=$this->entityManager;
        $Subscription=$entityManage->getRepository(Subscription::class)->find( $SubscriptionId);
        $doctor->setSubscription($Subscription);
        $speciality=$entityManage->getRepository(Speciality::class)->find($SpecialtyId);
        $doctor->setSpecialty($speciality);
        $entityManage->persist($doctor);
        $entityManage->flush();
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
