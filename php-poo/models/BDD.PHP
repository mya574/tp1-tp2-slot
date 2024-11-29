<?php

namespace Models;
use PDO;
use Exception;

class BDD{

  public static function connect(){
    $database = parse_ini_file(ROOT."/config/bdd.ini");
    $host = $database["host"];
    $dbname = $database["dbname"];
    $username = $database["username"];
    $password = $database["password"];

    try{

      $bdd = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8",
        $username,
        $password,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_SILENT]
      );

      return $bdd;

    }catch(Exception $e){
      die("Erreur : ". $e->getMessage());
    }
  }

}