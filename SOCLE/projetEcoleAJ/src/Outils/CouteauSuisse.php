<?php 

namespace App\Outils;

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
    
    public function getUsername($entity){
        $prenom =$entity->getPrenom();
        $nom=$entity->getNom();
        if(str_contains($prenom, '-')){
            $tab=explode('-', $prenom);
            foreach($tab as $key=>$value){
                $value=lcfirst($value);
                $value=substr($value, 0, 1);
            }
            $prenom=implode($tab);
        } else {
            $prenom=lcfirst($prenom);
            $prenom = substr($prenom, 0, 1);
        }
        $nom=strtolower($nom);
        $username=$prenom.$nom;
        return $username;
        
    }

    public function getEmail($entity, $username){
        $fin ="@guinot.asso.fr";
        $email=$username.$fin;
        return $email;
    }


}