<?php

error_reporting(E_ALL);
ini_set('display_errors', 'on');

require_once("../Factory/ArticleFactory.php");
require_once("../Factory/CategoryFactory.php");

$articleFactory = new ArticleFactory();
$categoryFactory = new CategoryFactory();

$articles = [];

for ($i = 1; $i <= 6; $i++) {
    $category = $categoryFactory->createCategory("categorie xxx");
    $article = $articleFactory->createArticle("titre".$i, "content ".$i, $category);
    array_push($articles, $article);
}

include("../View/homeView.php");
