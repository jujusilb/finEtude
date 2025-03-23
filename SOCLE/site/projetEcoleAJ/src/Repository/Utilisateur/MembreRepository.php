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

    public function getConcatNames($value)
    {
        $list = $this->createQueryBuilder('membre')
            ->select("membre.id, CONCAT(membre.prenom, ' ', membre.nom) AS qui")
            ->where('membre.prenom LIKE :value or membre.nom LIKE :value')
            ->setParameter('value', '%' . $value . '%')
            ->getQuery()
            ->getResult();
    
        //return array_map(fn($item) => $item['qui'], $list);
        return $list;
    }

        public function getMembre($value):?Membre
        {
            return $this->createQueryBuilder('membre')
                ->andWhere("CONCAT(membre.prenom, ' ', membre.nom) LIKE :value") // Correct LIKE and :value
                ->setParameter('value', '%' . $value . '%') 
                ->getQuery()    
                ->getOneOrNullResult(); 
        }

        public function returnMembre($value):?Membre
        {
            return $this->createQueryBuilder('membre')
                ->andWhere("membre.id = :value") // Correct LIKE and :value
                ->setParameter('value', $value) 
                ->getQuery()
                ->getOneOrNullResult(); 
        }


    public function updateDestinataireIdToNull($idMembre)
    {
        $qb = $this->getEntityManager()->createQueryBuilder();

        $qb->update('App\Entity\Message', 'message')
            ->set('message.destinataireId', '1')
            ->where('message.destinataireId = :idMembre')
            ->setParameter('idMembre', $idMembre);

        $qb->getQuery()->execute();
    }

    public function updatExpediteurIdToNull($idMembre)
    {
        $qb = $this->getEntityManager()->createQueryBuilder();

        $qb->update('App\Entity\Message', 'message')
            ->set('message.expediteurId', '1')
            ->where('message.expediteurId = :idMembre')
            ->setParameter('idMembre', $idMembre);

        $qb->getQuery()->execute();
    }

/*
public function getConcatNames($value)
{
    $dql = "SELECT CONCAT(Membre.prenom, ' ', Membre.nom) AS qui
            FROM App\Entity\Utilisateur\membre
            WHERE qui LIKE :value
            ORDER BY qui ASC";
    $query = $this->getEntityManager()->createQuery($dql);
    $query->setParameter('value', '%' . $value . '%');
    $list = $query->getResult();
    return array_map(fn($item) => $item["CONCAT(prenom, ' ', nom)"], $list);
}
*/




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
