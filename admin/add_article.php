<?php

require_once("../utils/init.php");
require_once("../model/categorie.php");
require_once("../model/article.php");

function checkForm($inputs, $files)
{
    $errors = [];
    if (empty(trim($inputs['name']))) {
        $errors['name'] = 'Name is required';
    }
    if (empty(trim($inputs['creator']))) {
        $errors['creator'] = 'Creator is required';
    }
    if (empty(trim($inputs['categorie']))) {
        $errors['categorie'] = 'Categorie is required';
    }
    if (empty(trim($inputs['price']))) {
        $errors['price'] = 'Price is required';
    }
    if (empty(trim($inputs['stock']))) {
        $errors['stock'] = 'Stock is required';
    }
    if (empty($files['image']['name'])) {
        $errors['image'] = 'An image is required';
    }
    return $errors;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = checkForm($_POST, $_FILES);

    $article = [
        'name' => sanitize_input($_POST['name']),
        'creator' => sanitize_input($_POST['creator']),
        'categorie' => sanitize_input($_POST['categorie']),
        'price' => sanitize_input($_POST['price']),
        'stock' => sanitize_input($_POST['stock']),
    ];

    if (sizeof($errors) === 0) {
        $target_dir = './uploads/';
        $target_file = $target_dir . $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
        $article['image'] = $target_file;
        insert_article($article);
        redirect('../admin.php?message=added');
    }
}

$categories = get_categories();

?>

<?php require_once('../components/head.php'); ?>

<body>
<?php require_once('../components/header.php'); ?>

<main>
    <form method="POST" enctype="multipart/form-data">
        <label for="name">Nom</label>
        <input type="text" name="name" value="<?= isset($_POST['name']) ? $_POST['name']: '' ?>"><br/>
        <?= isset($errors) && isset($errors['name']) ? $errors['name'] : "" ?><br/>
        <label for="creator">Créateur</label>
        <input type="text" name="creator" value="<?= isset($_POST['creator']) ? $_POST['creator']: '' ?>"><br/>
        <?= isset($errors) && isset($errors['creator']) ? $errors['creator'] : "" ?><br/>
        <label for="categorie">Catégorie</label>
        <select id="categorie" name="categorie">
            <?php foreach ($categories as $c) : ?>
                <option value="<?= $c['id'] ?>" <?= isset($_POST['categorie']) && $c['id'] == $_POST['categorie'] ? 'selected' : '' ?>><?= $c['nom'] ?></option>
            <?php endforeach ?>
        </select><br/>
        <?= isset($errors) && isset($errors['categorie']) ? $errors['categorie'] : "" ?><br/>
        <label for="prix">Prix</label>
        <input type="text" name="price" value="<?= isset($_POST['price']) ? $_POST['price']: '' ?>"><br/>
        <?= isset($errors) && isset($errors['price']) ? $errors['price'] : "" ?><br/>
        <label for="stock">Stock</label>
        <input type="text" name="stock" value="<?= isset($_POST['stock']) ? $_POST['stock']: '' ?>"><br/>
        <?= isset($errors) && isset($errors['stock']) ? $errors['stock'] : "" ?><br/>
        <input type="file" name="image" value="<?= isset($_POST['image']) ? $_POST['image']: '' ?>"><br/>
        <?= isset($errors) && isset($errors['image']) ? $errors['image'] : "" ?><br/>
        <button type="submit">Mettre en vente</button>
    </form>
</main>

<?php require_once('../components/footer.php'); ?>
</body>

</html>