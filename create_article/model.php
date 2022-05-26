<?php

require_once "../config/db.php";

function insertArticle($article) {
    global $db_default_connection;
    if (isset($article['image'])) {
        $query = "INSERT INTO articles(title, content, creation_date, image) VALUES(:title, :content, now(), :image)";
    } else {
        $query = "INSERT INTO articles(title, content, creation_date) VALUES(:title, :content, now())";
    }
    $stmt = $db_default_connection->prepare($query);
    $stmt->execute($article);
    return $stmt;
}
