<?php

namespace App\Repository\Boutique;

use App\Entity\Boutique\Produit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Produit>
 */
class ProduitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Produit::class);
    }

    /**
     * @return Produit[] Returns an array of Produit objects
     */
    public function findByarchive($value): array
    {
        return $this->createQueryBuilder('produit')
            ->andWhere('produit.archive = :val')
            ->setParameter('val', $value)
            ->orderBy('produit.id', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    
    }
    
        /**
         * Find all produits, grouped by their type.
         *
         * @return array
         */
        public function findByType($value): array
        {
            // Récupérer tous les produits en incluant leur type
            $queryBuilder = $this->createQueryBuilder('produit')
                ->leftJoin('produit.categorieProduit', 'categorieProduit')
                ->addSelect('categorieProduit')
                ->andWhere('produit.archive = :val')
                ->setParameter('val', $value)
                ->orderBy('categorieProduit.libelle', 'ASC')
                ->getQuery();
    
            $produits = $queryBuilder->getResult();
    
            $produitsParType = [];
    
            foreach ($produits as $produit) {
                $type = $produit->getCategorieProduit()->getLibelle();
                if (!isset($produitsParType[$type])) {
                    $produitsParType[$type] = [];
                }
    
                $produitsParType[$type][] = [
                    'id' => $produit->getId(),
                    'libelle' => $produit->getLibelle(),
                    'description' => $produit->getDescription(),
                    'dateEvent' => $produit->getDateEvent(),
                    'createdAt' => $produit->getCreatedAt(),
                    'stock' => $produit->getStock(),
                    'prix' => $produit->getPrix(),
                ];
            }
    
            return $produitsParType;
        }


//    public function findOneBySomeField($value): ?Produit
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
