<?php

require_once "../config/db.php";

function getArticles($page) {
    global $db_default_connection;
    $offset = ($page-1) * ROW_PER_PAGE;
    $query = "SELECT id, title, content, creation_date, image FROM articles LIMIT {$offset}, " . ROW_PER_PAGE;
    $stmt = $db_default_connection->prepare($query);
    $stmt->execute();
    return $stmt;
}

function getMappedArticles($page) {
    $stmt = getArticles($page);
    $count = $stmt->rowCount();

    $articles = [];

    if ($count > 0) {
        // Fetch le prochain article et le sauver dans la variable $article
        while($article = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $mapped_article = [
                "id" => +$article["id"],
                "title" => $article["title"],
                "content" => $article["content"],
                "creationDate" => date_create($article["creation_date"]),
                "image" => $article["image"]
            ];
            array_push($articles, $mapped_article);
        }
    }

    return $articles;
}

