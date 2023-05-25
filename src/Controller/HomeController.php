<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class HomeController extends AbstractController
{
    //home.index c'est le nom de la route;
    #[Route('/','home.index',methods:['GET'])]
    public function index(): Response
    { 
        return $this->render('home.html.twig');
    }
}
// twig: moteur de template de symfony