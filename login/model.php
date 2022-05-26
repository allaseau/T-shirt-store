<?php

require_once '../config/db.php';

function getUserByName($name) {
    global $db_default_connection;
    $query = 'SELECT name, password, first_name, last_name FROM users WHERE name = :name';
    $stmt = $db_default_connection->prepare($query);
    $stmt->execute([
        'name' => $name
    ]);
    return $stmt;
}

function checkUser($name, $password) {
    $stmt = getUserByName($name);
    $count = $stmt->rowCount();
    if ($count === 1) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if (password_verify($password, $user['password'])) {
            return [
                'name' => $user['name'],
                'firstName' => $user['first_name'],
                'lastName' => $user['last_name']
            ];
        } else {
            return null;
        }
    } else {
        return null;
    }
}
