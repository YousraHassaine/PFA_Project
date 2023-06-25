<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
class HomeController extends AbstractController
{
    //home.index c'est le nom de la route;
    #[Route('/', name:'home.index')]
    public function index(): Response
    { 
        return $this->render('home.html.twig');
    }

    /*#[Route('/Afficher', name: 'details_products')]
    public function Afficher(Request $request): Response
    {
        dd($request);

        return $this->render('details_products/index.html.twig');
    }*/

    
}
// twig: moteur de template de symfony