<?php 

require($_SERVER['DOCUMENT_ROOT'] . '/tshirt-store/config/db.php');

function get_categories() {
    $db = $GLOBALS["mysqli"];
    $stmt = $db->prepare("SELECT * FROM Categorie");
    $stmt->execute();
    $result = $stmt->get_result();

    $categories = [];
    if ($stmt->affected_rows > 0) {
        while($categorie = $result->fetch_assoc()) {
            $mapped_categorie = [
                "id" => $categorie["ID"],
                "nom" => $categorie["Nom"]
            ];
            array_push($categories, $mapped_categorie);
        }
    }
    $stmt->close();

    return $categories;
}
function getLatestArticles() {
    $db = $GLOBALS["mysqli"];
    $stmt = $db->prepare("SELECT * FROM article ORDER BY Date_crea DESC LIMIT 3");
    $stmt->execute();
    $result = $stmt->get_result();
    $count = $result->num_rows;

    $articles = [];

    if ($count > 0) {
        while($article = $result->fetch_assoc()) {
            $mapped_article = [
                "ID" => $article["ID"],
                "Nom" => $article["Nom"],
                "Createur" => $article["Createur"],
                "Date_crea" => date_create($article["Date_crea"]),
                "Img" => $article["Img"],
                "Prix" => $article["Prix"]
            ];
            array_push($articles, $mapped_article);
        }
    }

    return $articles;
}

function getRandomArticles() {
    $db = $GLOBALS["mysqli"];
    $stmt = $db->prepare("SELECT * FROM article ORDER BY RAND() LIMIT 3");
    $stmt->execute();
    $result = $stmt->get_result();
    $count = $stmt->num_rows;

    $count = $result->num_rows;

    $articles = [];

    if ($count > 0) {
        while($article = $result->fetch_assoc()) {
            $mapped_article = [
                "ID" => $article["ID"],
                "Nom" => $article["Nom"],
                "Createur" => $article["Createur"],
                "Date_crea" => date_create($article["Date_crea"]),
                "Img" => $article["Img"],
                "Prix" => $article["Prix"]
            ];
            array_push($articles, $mapped_article);
        }
    }

    return $articles;
}