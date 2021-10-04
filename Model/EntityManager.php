<?php

require_once("Entity/Article.php");
require_once("Database/MysqlDatabaseConnexion.php");


class EntityManager
{

    private ?PDO $dbConnexion;

    public function __construct() {
        $mysqlDBConnexion = new MysqlDatabaseConnexion();
        $this->dbConnexion = $mysqlDBConnexion->connect();
    }

    public function persistArticle(Article $article)
    {
        $sql = "INSERT INTO article (title, content, status, created_at)
                VALUES (
                        :title, 
                        :content, 
                        :status,
                        :created_at
                )
        ";

        $req = $this->dbConnexion->prepare($sql);

        $req->execute(array(
            "title" => $article->getTitle(),
            "content" => $article->getContent(),
            "status" => $article->getStatus(),
            "created_at" => $article->getCreatedAt()->format('Y-m-d H:i:s')
        ));

    }

}
