<?php

namespace Controllers;

use Models\Article;

class ArticlesController{


    private static $globalTemplatePath = ROOT ."/templates/Global.php";

    public static function index(){
        self::getList();

    }

    public static function getList(){
        $articlesList= Article::getList();
        require_once ROOT."/views/Articles_list.php";
        require_once ROOT."/templates/Global.php";

    }

    public static function getById(int $id){
        $article= Article::getById($id);
        require_once ROOT."/views/show_article.php";
        require_once self::$globalTemplatePath;
    }


    public static function update(int $id){
        $article = Article::getById($id);
        require_once ROOT."/views/update_article.php";
        require_once self::$globalTemplatePath;
    }

    public static function updateArticle()
    {
      $id = isset($_POST["id"]) && !empty($_POST["id"]) ? (int) $_POST["id"] : null;
      $title = isset($_POST["title"]) && !empty($_POST["title"]) ? $_POST["title"] : null;
      $author = isset($_POST["author"]) && !empty($_POST["author"]) ? $_POST["author"] : null;
      $content = isset($_POST["content"]) && !empty($_POST["content"]) ? $_POST["content"] : null;
      $created_date = isset($_POST["created_date"]) && !empty($_POST["created_date"]) ? $_POST["created_date"] : null;
  
      if (
        is_null($id)
        || is_null($title)
        || is_null($author)
        || is_null($content)
        || is_null($created_date)
      ) {
          ErrorsController::launchError(404);
          exit;
      }
  
      Article::update(
        id: $id,
        title: $title,
        content: $content,
        author: $author,
        created_date: $created_date
      );
      header("Location: /articles");
      exit;
    }

    public static function deleteArticle(){
        $id= isset($_POST["id"]) && !empty($_POST["id"]) ? (int) $_POST["id"]:null;
        
        if(is_null($id)){
            ErrorsController::launchError(404);
            exit;
        }

        Article::deleteArticle($id);

        header("Location: /articles");
        exit;
    }
  

}
