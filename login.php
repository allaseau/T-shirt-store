<?php
    require_once("./utils/init.php");
    require_once("./model/user.php");

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $user = get_user_by_email(sanitize_input($_POST['mail']));
        if ($user) {
            if (hash("sha256", sanitize_input($_POST['password'])) === $user['Password']) {
                $_SESSION['login'] = [
                    'nom' => $user['Nom'],
                    'prenom' => $user['Prenom'],
                    'mail' => $user['Adresse_mail'],
                ];

                $redirect = isset($_GET['redirect']) ? urldecode($_GET['redirect']) : './admin.php' ;
                redirect($redirect);
            } else {
                $error_message = "Inccorect credentials";
            }
        } else {
            $error_message = "User not found";
        }
    }

?>
<?php require_once('./components/head.php'); ?>

<body>
    <?php require_once('./components/header.php'); ?>

    <main>
        <form method="POST">
            <label for="mail">E-mail</label>
            <input type="text" name="mail" value="<?= isset($_POST['mail']) ? $_POST['mail'] : "" ?>"><br/>
            <label for="pass">Password</label>
            <input type="password" name="password"><br/>
            <button type="submit">Connection</button>
        </form>
        <?= isset($error_message) ? $error_message : "" ?>
    </main>

    <?php require_once('./components/footer.php'); ?>
</body>

</html>