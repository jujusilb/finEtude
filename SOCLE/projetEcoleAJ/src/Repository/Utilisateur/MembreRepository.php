<?php

namespace App\Repository\Utilisateur;

use App\Entity\Utilisateur\Membre;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Membre>
 */
class MembreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Membre::class);
    }


/*
    public function getConcatNames($value){
        $list =$this->createQueryBuilder('membre')
        ->select('concat(membre.prenom, " ", membre.nom) AS qui')
        ->where('concat(membre.prenom, " ", membre.nom) LIKE :value')
        ->setParameter('value', '%'.$value.'%')
        ->orderBy('qui', 'ASC')
        ->getQuery()
        ->getResult();
        return array_map(fn($item) => $item['qui'], $list);
    }
*/


public function getConcatNames($value)
{
    ?><script>console.log("IN getConcatNames")</script><?php
    $dql = "SELECT CONCAT(m.prenom, ' ', m.nom) qui
            FROM Membre m
            WHERE CONCAT(m.prenom, ' ', m.nom) LIKE :value
            ORDER BY qui ASC";
    $query = $this->getEntityManager()->createQuery($dql);
    $query->setParameter('value', '%' . $value . '%');
    $list = $query->getResult();
    dd($list);
    $file='fichieraecrirepourcomprendre.txt';
    file_put_contents($file, $current);
    return array_map(fn($item) => $item['qui'], $list);
}





    //    /**
    //     * @return Membre[] Returns an array of Membre objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('m')
    //            ->andWhere('m.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('m.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Membre
    //    {
    //        return $this->createQueryBuilder('m')
    //            ->andWhere('m.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
