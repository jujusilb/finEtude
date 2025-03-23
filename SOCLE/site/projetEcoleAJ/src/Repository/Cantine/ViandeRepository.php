<?php

namespace App\Repository\Cantine;

use App\Entity\Cantine\Viande;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Viande>
 */
class ViandeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Viande::class);
    }

    /**
     * @return Viande[] Returns an array of Viande objects
     */
    public function findByLibelle($value): array
    {
        return $this->createQueryBuilder('viande')
            ->andWhere('viande.libelle = :val')
            ->setParameter('val', $value)
            ->orderBy('viande.id', 'ASC')
            //->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

//    public function findOneBySomeField($value): ?Viande
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
