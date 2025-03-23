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


   
}