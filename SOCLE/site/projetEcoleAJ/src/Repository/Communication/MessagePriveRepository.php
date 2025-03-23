<?php

namespace App\Repository\Communication;

use App\Entity\Communication\MessagePrive;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<MessagePrive>
 */
class MessagePriveRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MessagePrive::class);
    }


    public function findByExpediteur($user):array
    {
        return $this->createQueryBuilder('messagePrive')
            ->join('messagePrive.expediteur', 'membre')
            ->where('membre.id = :user')
            ->setParameter('user', $user)
            ->orderBy('messagePrive.id', 'ASC')
            ->getQuery()
            ->getResult();
            return $data;           
    }
    

        
    public function findByDestinataire($user):array
    {
        return $this->createQueryBuilder('messagePrive')
            ->join('messagePrive.destinataire', 'membre')
            ->where('membre.id = :user')
            ->setParameter('user', $user)
            ->orderBy('messagePrive.id', 'ASC')
            ->getQuery()
            ->getResult();
    }

//    /**
//     * @return MessagePrive[] Returns an array of MessagePrive objects
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

//    public function findOneBySomeField($value): ?MessagePrive
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
