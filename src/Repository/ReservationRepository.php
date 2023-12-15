<?php

namespace App\Repository;

use App\Entity\Chambre;
use App\Entity\Client;
use App\Entity\Reservation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query\Expr;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Reservation>
 *
 * @method Reservation|null find($id, $lockMode = null, $lockVersion = null)
 * @method Reservation|null findOneBy(array $criteria, array $orderBy = null)
 * @method Reservation[]    findAll()
 * @method Reservation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReservationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Reservation::class);
    }

   /**
    * @return Reservation[] Returns an array of Reservation objects
    */
   public function findWithNamesAndIds($id): array
   {
       return $this->createQueryBuilder('R')
       ->select('DISTINCT R.id, R.reservation, R.etat, R.id_client_fk, R.id_chambre_fk')
       ->addSelect('C.name, H.num')
            ->join(Client::class, 'C', 'C.id = R.id_client_fk')
            ->Join(Chambre::class, 'H', 'R.id_chambre_fk=H.id')
            ->where('R.id = :id')
            ->setParameter(':id', $id)
            ->getQuery()
            ->getResult()[0];
   }

//    public function findOneBySomeField($value): ?Reservation
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }

// SELECT * FROM reservation R
// LEFT JOIN client C ON R.id_client_fk = C.id
// LEFT JOIN chambre H ON R.id_chambre_fk = H.id
}
