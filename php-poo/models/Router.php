<?php
namespace Models;
class Router{
    private $routes =[];

    public function get($uri,$callback){
        $this->routes["GET"][$uri]=$callback;//stocker dans notre tableau la requette get avec son uri 
        //uri:c'est l'url juste tu lui enléve le http et le nom de domaine 
    }



    public function post($uri,$callback){
        $this->routes["POST"][$uri]=$callback;
    }



    public function run(){
        $uri = parse_url($_SERVER["REQUEST_URI"],PHP_URL_PATH);
        $method = $_SERVER["REQUEST_METHOD"];

        if(!isset($this->routes[$method][$uri])){
            
            exit;
        }

        call_user_func($this->routes[$method][$uri]);//call user func permets de declancher des function 
    }
}