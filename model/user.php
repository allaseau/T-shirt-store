<?php 
global $root_path;

require($root_path . '/config/db.php');

function get_user_by_email($email) {
    global $mysqli;
    
    $stmt = $mysqli->prepare("SELECT * FROM User WHERE Adresse_mail = ?");
    $stmt->bind_param("s", $email);

    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();

    return $user;
}