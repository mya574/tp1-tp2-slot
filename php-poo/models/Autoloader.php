<?php
 
namespace Models;
 
class Autoloader{
 
  public static function register(){
    spl_autoload_register(array(__CLASS__, "autoload"));
  }
 
  public static function autoload($class)
  {
    if (strpos($class, "Controllers\\") === 0) {
      $class = str_replace("Controllers\\", "", $class);
      if (file_exists(ROOT . "/controllers/$class.php")) {
        require_once ROOT . "/controllers/$class.php";
      }
    }

    if (strpos($class, __NAMESPACE__ . "\\") === 0) {
      $class = str_replace(__NAMESPACE__ . "\\", "", $class);
      if (file_exists(ROOT . "/models/$class.php")) {
        require_once ROOT . "/models/$class.php";
      }
    }
  }
 
}


  