<?php

namespace App\Repository;

use App\Entity\Appointment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Appointment>
 *
 * @method Appointment|null find($id, $lockMode = null, $lockVersion = null)
 * @method Appointment|null findOneBy(array $criteria, array $orderBy = null)
 * @method Appointment[]    findAll()
 * @method Appointment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AppointmentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Appointment::class);
    }

    public function save(Appointment $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Appointment $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
    public function findAppointmentsByPatient(Patient $patient): array
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.Patient = :patient')
            ->setParameter('patient', $patient)
            ->getQuery()
            ->getResult();
    }
    public function countAppointmentsByMonth(EntityManagerInterface $entityManager, int $year)
    {
        $connection = $entityManager->getConnection();

        $sql = "
        SELECT COUNT(a.id) as totalRdv, MONTH(a.created_at) as mois
        FROM appointment a
        WHERE YEAR(a.created_at) = :year
        GROUP BY mois
    ";
        $statement = $connection->prepare($sql);
        $statement->bindValue('year', $year);
        $statement->execute();

        $results = $statement->fetchAllAssociative(); // Utilisez fetchAllAssociative() ou fetchAllNumeric() selon vos besoins

        return $results;
    }



//    /**
//     * @return Appointment[] Returns an array of Appointment objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Appointment
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
