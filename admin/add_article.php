<?php

require_once("../utils/init.php");
require_once("../model/categorie.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    var_dump($_POST);
}

$categories = get_categories();

?>

<?php require_once('../components/head.php'); ?>

<body>
    <?php require_once('../components/header.php'); ?>

    <main>
        <form method="POST">
            <label for="name">Nom</label>
            <input type="text" name="Nom"><br />
            <label for="creator">Créateur</label>
            <input type="text" name="creator">
            <label for="categorie">Catégorie</label>
            <select id="categorie" name="categorie">
                <?php foreach($categories as $c) : ?>
                    <option value="<?= $c['id'] ?>"><?= $c['nom'] ?></option>
                <?php endforeach ?>
            </select>
            <label for="prix">Prix</label>
            <input type="text" name="prix">
            <input type="file" name="img">
            <button type="submit">Mettre en vente</button>
        </form>
    </main>

    <?php require_once('../components/footer.php'); ?>
</body>

</html>