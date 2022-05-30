<?php
global $root_path;
require($root_path . '/config/db.php');


function get_categories() {
    global $mysqli;

    $stmt = $mysqli->prepare("SELECT * FROM Categorie");
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