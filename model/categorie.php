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