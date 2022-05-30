<?php
global $root_path;

require($root_path . '/config/db.php');

function insert_contact($contact) {
    global $mysqli;
    $current_date = date('Y-m-d H:i:s');
    $stmt = $mysqli->prepare("
            INSERT INTO contact (nom, email, phone, message, date_envoi) 
            VALUES (?, ?, ?, ?, ?)
        ");
    $stmt->bind_param("sssss", $contact['nom'], $contact['email'], $contact['phone'], $contact['message'], $current_date);
    $stmt->execute();
    $stmt->close();

}

function get_contacts() {
    global $mysqli;

    $stmt = $mysqli->prepare("SELECT * FROM Contact");
    $stmt->execute();
    $result = $stmt->get_result();

    $contacts = [];
    if ($stmt->affected_rows > 0) {
        while($contact = $result->fetch_assoc()) {
            $mapped_contact = [
                "id" => $contact["ID"],
                "nom" => $contact["nom"],
                "email" => $contact["email"],
                "phone" => $contact["phone"],
                "message" => $contact["message"],
                "date_envoi" => $contact["date_envoi"]
            ];
            array_push($contacts, $mapped_contact);
        }
    }
    $stmt->close();

    return $contacts;
}