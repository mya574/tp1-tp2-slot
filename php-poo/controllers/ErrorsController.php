<?php

namespace Controllers;


class ErrorsController{
    public static function launchError(int $code){
        switch($code){
            case 404:
              default:
                require_once ROOT."/views/errors/404.php";
                require_once ROOT."/templates/global.php";
                break;
        }
    }
}