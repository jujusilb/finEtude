<?php

namespace App\Repository\Cantine;

use App\Entity\Cantine\Dessert;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Dessert>
 */
class DessertRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Dessert::class);
    }

    /**
     * @return Dessert[] Returns an array of Dessert objects
     */
    public function findByLibelle($value): array
    {
        return $this->createQueryBuilder('dessert')
            ->andWhere('dessert.libelle = :val')
            ->setParameter('val', $value)
            ->orderBy('dessert.id', 'ASC')
            //->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    public function getLibelle($value)
    {
        $list = $this->createQueryBuilder('dessert')
            ->select("dessert.id, dessert.libelle")
            ->where('dessert.libelle LIKE :value')
            ->setParameter('value', '%' . $value . '%')
            ->getQuery()
            ->getResult();
    
        //return array_map(fn($item) => $item['qui'], $list);
        return $list;
    }

//    public function findOneBySomeField($value): ?Dessert
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
