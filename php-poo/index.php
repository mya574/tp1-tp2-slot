<?php

use Models\Autoloader;
ini_set("date.timezone","europe/paris");
require_once "./utils/Defines.php";
require_once "./models/Autoloader.php";




Autoloader::register();
use Models\BDD;
use Models\Article;
use Models\Router;
use Controllers\ErrorsController;
use Controllers\ArticlesController;
use Controllers\BlogController;
use Controllers\SlotController;


$article = new Article(BDD::connect());
$article_test=[
    "title"=>"test",
    "content"=>"contenu de test",
    "author"=>"ebdevoo"

];
/*
$article->add(
    $article_test["title"],
    $article_test["content"],
    $article_test["author"],
);
*/

/*var_dump($article::getList());
echo"<hr/>";
var_dump($article::getById(1));


$article_updated=[
    "id"=>1,
    "title"=>"test modifié",
    "content"=>"contenu modifié",
    "author"=>"webdevooUpdates",
    "created_date"=>new Datetime("now")
];

$article::update(
    $article_updated["id"],
    $article_updated["title"],
    $article_updated["content"],
    $article_updated["author"],
    $article_updated["created_date"]->sub(\DateInterval::createFromDateString("1 hour"))->format("Y/m/d H:i:s"),
    
);

*/

$router = new Router();

$uri = $_SERVER["REQUEST_URI"];
$idParam =(int) preg_replace("/[\D]+/","" ,$uri);

switch (true) {
    case ($uri === "/"):
        $router->get("/", BlogController::index());
        break;
    case ($uri === "/slot"):
         $router->get("/slot", SlotController::index());
        break;
    
    case ($uri === "/slot/play"):
            SlotController::play();
        break;
       
    
      case (str_contains($uri, "/articles")): //on va chercher dans $uri le /article, et si il y est on passe dans la boucle
        if ($idParam && !str_contains($uri,"/update")) {
          $router->get("/articles/$idParam", ArticlesController::getById($idParam));
          exit;
        }
        else if ($idParam && str_contains($uri, "/update")) {
          $router->get("/articles/update/$idParam", ArticlesController::update($idParam));
          exit;
        }
        else if(!$idParam && str_contains($uri, "/update")){
          $router->post("/articles/update", ArticlesController::updateArticle());
          exit;
        }
        else if (!$idParam && str_contains($uri,"/delete")){
            $router->post("/articles/delete",ArticlesController::deleteArticle());
            exit;
        }
        $router->get("/articles", ArticlesController::getList());
        break;
        default:
          ErrorsController::launchError("404");
          break;
}

$router->run();
 

