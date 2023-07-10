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
    public function index(EntityManagerInterface $entityManager): Response
    {
        $year = 2023; // Année souhaitée

        $results = $this->findAllGreaterThanPrice($entityManager, $year);

        //dd($results);
        // Affichage des résultats dans une vue
        return $this->render('test/index.html.twig', [
            'results' => $results,
            'year' => $year,
        ]);
    }

    public function findAllGreaterThanPrice(EntityManagerInterface $entityManager, int $year): array
    {
        $conn = $entityManager->getConnection();

        $sql = '
        SELECT COUNT(a.id) as totalRdv, MONTH(a.created_at) as mois
        FROM appointment a
        WHERE YEAR(a.created_at) = :year
        GROUP BY mois
    ';

        $resultSet = $conn->executeQuery($sql, ['year' => $year]);

        // returns an array of arrays (i.e. a raw data set)
        return $resultSet->fetchAllAssociative();
    }



}
