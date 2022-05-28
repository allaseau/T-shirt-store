<?php 

require("./config/db.php");

function get_user_by_email($email) {
    $db = $GLOBALS["mysqli"];
    
    $stmt = $db->prepare("SELECT * FROM User WHERE Adresse_mail = ?");
    $stmt->bind_param("s", $email);

    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();

    return $user;
}