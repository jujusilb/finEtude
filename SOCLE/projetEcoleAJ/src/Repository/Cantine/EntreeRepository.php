<?php

namespace App\Repository\Cantine;

use App\Entity\Cantine\Entree;
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

    public function getLibelle($value)
    {
        $list = $this->createQueryBuilder('entree')
            ->select("entree.id, entree.libelle")
            ->where('entree.libelle LIKE :value')
            ->setParameter('value', '%' . $value . '%')
            ->getQuery()
            ->getResult();
    
        //return array_map(fn($item) => $item['qui'], $list);
        return $list;
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
