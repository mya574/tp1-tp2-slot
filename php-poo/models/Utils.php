<?php


namespace Models;



class Utils{
    public static function launchException (string $message){
        throw new \Exception($message);
    }
    public static function readException (\Exception $e){
        die("Erreur:". $e->getMessage());
    }
}