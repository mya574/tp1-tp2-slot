<?php

namespace Controllers;

class SlotController{

    public static function index(){
        require_once ROOT."/views/slot.php";
        require_once ROOT."/templates/Global.php";
    }

    public static function play(){
        header('Content-Type: application/json');
       
        $symbols_with_weights = [
        '🍋' => 40,
        '🍒' => 30,
        '⭐' => 15,
        '🔔' => 10,
        '💎' => 5,
        ];
   
        $paytable = [
        '🍋🍋🍋' => 40,
        '🍒🍒🍒' => 50,
        '⭐⭐⭐' => 100,
        '🔔🔔🔔' => 150,
        '💎💎💎' => 200,
        ];
    

        $reel1 = self::getRandomSymbol($symbols_with_weights);
        $reel2 = self::getRandomSymbol($symbols_with_weights);
        $reel3 = self::getRandomSymbol($symbols_with_weights);
        // Résultat de la machine à sous
        $combination = $reel1 . $reel2 . $reel3;
        // Calculer le gain
        $gain = isset($paytable[$combination]) ? $paytable[$combination] : 0;
        // Réponse JSON
        echo json_encode([
        'success' => true,
        'reels' => [$reel1, $reel2, $reel3],
        'gain' => $gain,
         ]);
    }

    public static function getRandomSymbol($symbols_with_weights){
        $rand = mt_rand(1, array_sum($symbols_with_weights)); 
    foreach ($symbols_with_weights as $symbol => $weight) {
        if ($rand <= $weight) {
            return $symbol;
    }
    $rand -= $weight; // Réduire le seuil
    }
    return null; // Cas improbable
    }
}
