<?php

namespace App\Repository\CDI;

use App\Entity\CDI\Ouvrage;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Ouvrage>
 */
class OuvrageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ouvrage::class);
    }

    public function getTitre($value)
    {
        $list = $this->createQueryBuilder('ouvrage')
            ->select('ouvrage.id, ouvrage.titre')
            ->where('ouvrage.titre LIKE :value')
            ->setParameter('value', '%' . $value . '%')
            ->getQuery()
            ->getResult();
    
        //return array_map(fn($item) => $item['qui'], $list);
        return $list;
    }

    //    /**
    //     * @return Ouvrage[] Returns an array of Ouvrage objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('o')
    //            ->andWhere('o.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('o.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Ouvrage
    //    {
    //        return $this->createQueryBuilder('o')
    //            ->andWhere('o.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
