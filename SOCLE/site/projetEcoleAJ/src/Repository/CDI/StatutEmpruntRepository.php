<?php

namespace App\Repository\CDI;

use App\Entity\CDI\StatutEmprunt;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<StatutEmprunt>
 */
class StatutEmpruntRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StatutEmprunt::class);
    }


    public function getStatutEmprunt($value): StatutEmprunt
    {
        return $this->createQueryBuilder('statut')
            ->andWhere('statut.libelle = :val')
            ->setParameter('val', $value)
            ->orderBy('statut.id', 'ASC')
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
//    /**
//     * @return StatutEmprunt[] Returns an array of StatutEmprunt objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?StatutEmprunt
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
