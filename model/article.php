<?php
global $root_path;

require($root_path . '/config/db.php');

function insert_article($article) {
    global $mysqli;
    $current_date = date('Y-m-d H:i:s');
    $stmt = $mysqli->prepare("
            INSERT INTO article (Nom, Createur, Date_crea, Img, Prix, Stock, Categorie_ID) 
            VALUES (?, ?, ?, ?, ?, ?, ?)
        ");
    $stmt->bind_param("ssssiii", $article['name'], $article['creator'], $current_date, $article['image'], $article['price'], $article['stock'], $article['categorie']);
    $stmt->execute();
    $stmt->close();

}

function get_article_by_id($id) {
    global $mysqli;

    $stmt = $mysqli->prepare("SELECT * FROM article WHERE ID = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    $mapped_article = [];
    if ($stmt->affected_rows > 0) {
        $article = $result->fetch_assoc();
        $mapped_article = [
            "id" => $article["ID"],
            "nom" => $article["Nom"],
            "createur" => $article["Createur"],
            "date_creation" => $article["Date_crea"],
            "image" => $article["Img"],
            "prix" => $article["Prix"],
            "stock" => $article["Stock"],
        ];
    }
    $stmt->close();

    return $mapped_article;
}

function get_newest_articles() {
    global $mysqli;

    $stmt = $mysqli->prepare("SELECT * FROM article ORDER BY Date_crea DESC LIMIT 3");
    $stmt->execute();
    $result = $stmt->get_result();

    $articles = [];
    if ($stmt->affected_rows > 0) {
        while($article = $result->fetch_assoc()) {
            $mapped_article = [
                "id" => $article["ID"],
                "nom" => $article["Nom"],
                "createur" => $article["Createur"],
                "date_creation" => $article["Date_crea"],
                "image" => $article["Img"],
                "prix" => $article["Prix"],
                "stock" => $article["Stock"],
            ];
            array_push($articles, $mapped_article);
        }
    }
    $stmt->close();

    return $articles;
}

function get_random_articles() {
    global $mysqli;

    $stmt = $mysqli->prepare("SELECT * FROM article ORDER BY RAND() LIMIT 3");
    $stmt->execute();
    $result = $stmt->get_result();

    $articles = [];
    if ($stmt->affected_rows > 0) {
        while($article = $result->fetch_assoc()) {
            $mapped_article = [
                "id" => $article["ID"],
                "nom" => $article["Nom"],
                "createur" => $article["Createur"],
                "date_creation" => $article["Date_crea"],
                "image" => $article["Img"],
                "prix" => $article["Prix"],
                "stock" => $article["Stock"],
            ];
            array_push($articles, $mapped_article);
        }
    }
    $stmt->close();

    return $articles;
}

function get_categorie_articles($id) {
    global $mysqli;

    $stmt = $mysqli->prepare("SELECT * FROM article WHERE Categorie_ID = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    $articles = [];
    if ($stmt->affected_rows > 0) {
        while($article = $result->fetch_assoc()) {
            $mapped_article = [
                "id" => $article["ID"],
                "nom" => $article["Nom"],
                "createur" => $article["Createur"],
                "date_creation" => $article["Date_crea"],
                "image" => $article["Img"],
                "prix" => $article["Prix"],
                "stock" => $article["Stock"],
            ];
            array_push($articles, $mapped_article);
        }
    }
    $stmt->close();

    return $articles;
}