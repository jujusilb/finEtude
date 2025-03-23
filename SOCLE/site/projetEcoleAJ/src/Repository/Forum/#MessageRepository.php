<?php

namespace App\Repository\Forum;

use App\Entity\Utilisateur\Membre;
use App\Entity\Communication\Message;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Message>
 */
class MessageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Message::class);
    }




    public function findByExpediteur($user):array
    {
        echo "USER =".$user."<br>";
        if ($user) {
            $data= $this->createQueryBuilder('message')
                ->join('message.expediteur', 'membre')
                ->where('membre.id = :user')
                ->setParameter('user', $user)
                ->orderBy('message.id', 'ASC')
                ->getQuery()
                ->getResult();
                return $data;           
            }
        else  return $this->redirectToRoute('app_login');
    }

        
    public function findByDestinataire($user):array
    {
        if ($user) {
            return $this->createQueryBuilder('message')
                ->join('message.destinataire', 'membre')
                ->where('membre.id = :user')
                ->setParameter('user', $user)
                ->orderBy('message.id', 'ASC')
                ->getQuery()
                ->getResult();
        }
        else  return $this->redirectToRoute('app_login');
    }

   // public function updateDestinataire($user)


    //    /**
//     * @return Message[] Returns an array of Message objects
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

//    public function findOneBySomeField($value): ?Message
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
