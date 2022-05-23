<?php

require_once '../helpers/auth-helper.php';

init_session();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['logout'])) {
        $_SESSION['login'] = null;
        session_destroy();
    }
}

prevent_not_connected(false);

require './model.php';

require './view.php';