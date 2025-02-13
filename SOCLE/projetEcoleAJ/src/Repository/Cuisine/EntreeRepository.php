<?php

namespace App\Repository\Cuisine;

use App\Entity\Cuisine\Entree;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Entree>
 */
class EntreeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Entree::class);
    }
    /**
     * @return Entree[] Returns an array of Entree objects
     */
    public function findByLibelle($value): array
    {
        return $this->createQueryBuilder('entree')
            ->andWhere('entree.libelle = :val')
            ->setParameter('val', $value)
            ->orderBy('entree.id', 'ASC')
            //->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

//    public function findOneBySomeField($value): ?Entree
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
