<?php

require_once("./utils/init.php");
require_once("./model/contact.php");

function checkForm($inputs)
{
    $errors = [];
    if (empty(trim($inputs['name']))) {
        $errors['name'] = 'Name is required';
    }
    if (empty(trim($inputs['email']))) {
        $errors['email'] = 'E-mail is required';
    }
    if (empty(trim($inputs['phone']))) {
        $errors['phone'] = 'Phone is required';
    }
    if (empty(trim($inputs['message']))) {
        $errors['message'] = 'Message is required';
    }
    return $errors;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = checkForm($_POST);

    $contact = [
        'nom' => sanitize_input($_POST['name']),
        'email' => sanitize_input($_POST['email']),
        'phone' => sanitize_input($_POST['phone']),
        'message' => sanitize_input($_POST['message'])
    ];

    insert_contact($contact);
    redirect('./contact.php?message=added');
}

?>

<?php require_once('./components/head.php'); ?>

<body>
    <?php require_once('./components/header.php'); ?>

    <main>
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <?= isset($_GET['message']) && $_GET['message'] === 'added' ? "Votre message a bien été envoyé" : "" ?>
                <form method="POST">
                    <label for="name">Nom</label>
                    <input type="text" name="name" value="<?= isset($_POST['name']) ? $_POST['name'] : '' ?>"><br />
                    <?= isset($errors) && isset($errors['name']) ? $errors['name'] : "" ?><br />
                    <label for="email">E-mail</label>
                    <input type="email" name="email" value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>"><br />
                    <?= isset($errors) && isset($errors['email']) ? $errors['email'] : "" ?><br />
                    <label for="phone">Téléphone</label>
                    <input type="text" name="phone" value="<?= isset($_POST['phone']) ? $_POST['phone'] : '' ?>"><br />
                    <?= isset($errors) && isset($errors['phone']) ? $errors['phone'] : "" ?><br />
                    <label for="message">Message</label>
                    <textarea name="message"><?= isset($_POST['message']) ? $_POST['message'] : '' ?></textarea><br />
                    <?= isset($errors) && isset($errors['message']) ? $errors['message'] : "" ?><br />
                    <button type="submit">Envoyer mon message</button>
                </form>
            </div>
        </div>
    </main>

    <?php require_once('./components/footer.php'); ?>
</body>

</html>