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
    
}