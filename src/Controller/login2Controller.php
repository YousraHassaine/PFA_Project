<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\DoctorRepository;
use Doctrine\Persistence\ManagerRegistry;

class login2Controller extends AbstractController
{
    
    //home.index c'est le nom de la route;
    #[Route('/login2', name:'login2')]
    public function index(): Response
    { 
        return $this->render('doctor/login2.html.twig');
    }
}