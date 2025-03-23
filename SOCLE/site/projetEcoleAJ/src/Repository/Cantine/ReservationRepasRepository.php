<?php

namespace App\Repository\Cantine;
use App\Entity\Utilisateur\Membre;
use App\Entity\Cantine\ReservationRepas;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ReservationRepas>
 */
class ReservationRepasRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ReservationRepas::class);
    }

    public function findByMembre($user):array
    {
        return $this->createQueryBuilder('reservation')
                ->join('reservation.membre', 'membre')
                ->where('membre.id = :user')
                ->setParameter('user', $user)
                ->getQuery()
                ->getResult();   
    }

//    /**
//     * @return ReservationRepas[] Returns an array of ReservationRepas objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ReservationRepas
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
