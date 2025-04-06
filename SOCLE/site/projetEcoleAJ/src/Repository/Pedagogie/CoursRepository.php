<?php

namespace App\Repository\Pedagogie;

use App\Entity\Pedagogie\Cours;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Cours>
 */
class CoursRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cours::class);
    }

  /**
 * @return Cours[] Returns an array of Cours objects
 */
public function CoursPromo($promotionId): array
{
    return $this->createQueryBuilder('cours')
        ->join('cours.promotions', 'promotion')
        ->where('promotion.id = :promotionId')
        ->setParameter('promotionId', $promotionId)
        ->orderBy('cours.id', 'ASC')
        ->getQuery()
        ->getResult();
}
//    /**
//     * @return Cours[] Returns an array of Cours objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Cours
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
