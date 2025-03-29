<?php 

namespace App\Outils;

use Doctrine\ORM\src\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Attribute\Route;

class CouteauSuisse{
    
    public static function debug($array, $titre="demandé"){
        ?>
        <style>
            .debugage{
                border:1px solid black;
                background:radial-gradient(blue, white, red);
            }
        </style>
        <details class="debugage">
            <summary>detail du tableau <?=$titre?></summary>
            <pre>
                <?php print_r($array);?>
            </pre>
        </details>
        <?php
    }
    
    public function getUsername($prenom, $nom){
        if(str_contains($prenom, '-')){
            $tab=explode('-', $prenom);
            foreach($tab as $key=>$value){
                $tab[$key]=substr($value, 0, 1);
            }
            $prenom=implode($tab);
        } else {
            $prenom = substr($prenom, 0, 1);
        }
        $username=$prenom.$nom;
        $username=strtolower($username);
        return $username;
        
    }

    public function getEmail($username){
        $fin ="@guinot.asso.fr";
        $email=$username.$fin;
        return $email;
    }


  
    public function trieSqlr(string $table, string $field, EntityManagerInterface $entityManager): array
    {
        
        $queryBuilder = $entityManager->createQueryBuilder();
        $queryBuilder
        ->select('entity')
        ->from('App\Entity\\' . $table, 'entity')
        ->orderBy('entity.' . $field, 'ASC');
    
        return $queryBuilder->getQuery()->getResult();
    }
    #[Route('/trie/{table}/{field}', name: 'app_trie')]
    public function trieFuction(string $table, string $field){

    }
}