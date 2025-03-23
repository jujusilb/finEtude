<?php

namespace App\Repository\Cantine;

use App\Entity\Cantine\Legume;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Legume>
 */
class LegumeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Legume::class);
    }

    /**
     * @return Legume[] Returns an array of Legume objects
     */
    public function findByLibelle($value): array
    {
        return $this->createQueryBuilder('legume')
            ->andWhere('legume.libelle = :val')
            ->setParameter('val', $value)
            ->orderBy('legume.id', 'ASC')
            //->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

//    public function findOneBySomeField($value): ?Legume
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
