<?php

namespace App\Repository\Cantine;
use App\Entity\Utilisateur\Membre;
use App\Entity\Cantine\PlanningRepas;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PlanningRepas>
 */
class PlanningRepasRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PlanningRepas::class);
    }

    public function findByMembre($user):array
    {
        return $this->createQueryBuilder('planning')
                ->join('planning.membre', 'membre')
                ->where('membre.id = :user')
                ->setParameter('user', $user)
                ->getQuery()
                ->getResult();   
    }

//    /**
//     * @return PlanningRepas[] Returns an array of PlanningRepas objects
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

//    public function findOneBySomeField($value): ?PlanningRepas
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
