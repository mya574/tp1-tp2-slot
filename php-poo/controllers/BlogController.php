<?php

namespace controllers;

class BlogController{

    public static function index(){
        require_once ROOT."/views/home.php";
        require_once ROOT."/templates/Global.php";
    }
}