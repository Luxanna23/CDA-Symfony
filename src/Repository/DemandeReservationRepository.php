<?php

namespace App\Repository;

use App\Entity\DemandeReservation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DemandeReservation>
 *
 * @method DemandeReservation|null find($id, $lockMode = null, $lockVersion = null)
 * @method DemandeReservation|null findOneBy(array $criteria, array $orderBy = null)
 * @method DemandeReservation[]    findAll()
 * @method DemandeReservation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DemandeReservationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DemandeReservation::class);
    }

//    /**
//     * @return DemandeReservation[] Returns an array of DemandeReservation objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?DemandeReservation
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
