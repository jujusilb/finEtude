<?php

namespace App\Repository\Cantine;

use App\Entity\Cantine\Plat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Plat>
 */
class PlatRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Plat::class);
    }

    /**
     * @return Plat[] Returns an array of Plat objects
     */
    public function findByLibelle($value): array
    {
        return $this->createQueryBuilder('plat')
            ->andWhere('plat.libelle = :val')
            ->setParameter('val', $value)
            ->orderBy('plat.id', 'ASC')
            //->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    public function getLibelle($value)
    {
        $list = $this->createQueryBuilder('plat')
            ->select("plat.id, plat.libelle")
            ->where('plat.libelle LIKE :value')
            ->setParameter('value', '%' . $value . '%')
            ->getQuery()
            ->getResult();
    
        //return array_map(fn($item) => $item['qui'], $list);
        return $list;
    }

//    public function findOneBySomeField($value): ?Plat
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
