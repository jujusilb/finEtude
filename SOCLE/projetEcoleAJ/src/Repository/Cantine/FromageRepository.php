<?php

namespace App\Repository\Cantine;

use App\Entity\Cantine\Fromage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Fromage>
 */
class FromageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Fromage::class);
    }

    /**
     * @return Fromage[] Returns an array of Fromage objects
     */
    public function findByLibelle($value): array
    {
        return $this->createQueryBuilder('fromage')
            ->andWhere('fromage.libelle = :val')
            ->setParameter('val', $value)
            ->orderBy('fromage.id', 'ASC')
            //->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    public function getLibelle($value)
    {
        $list = $this->createQueryBuilder('fromage')
            ->select("fromage.id, fromage.libelle")
            ->where('fromage.libelle LIKE :value')
            ->setParameter('value', '%' . $value . '%')
            ->getQuery()
            ->getResult();
    
        //return array_map(fn($item) => $item['qui'], $list);
        return $list;
    }

//    public function findOneBySomeField($value): ?Fromage
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
