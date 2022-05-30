<?php
require_once("../utils/init.php");
require_once("../model/contact.php");

$contacts = get_contacts();
?>

<?php require_once('../components/head.php'); ?>

<body>
<?php require_once('../components/header.php'); ?>

<main>
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">E-mail</th>
            <th scope="col">Phone</th>
            <th scope="col">Message</th>
            <th scope="col">Send Date</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($contacts as $contact): ?>
        <tr>
            <td><?= $contact['id'] ?></td>
            <td><?= $contact['nom'] ?></td>
            <td><?= $contact['email'] ?></td>
            <td><?= $contact['phone'] ?></td>
            <td><?= $contact['message'] ?></td>
            <td><?= $contact['date_envoi'] ?></td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</main>

<?php require_once('../components/footer.php'); ?>
</body>

</html>