<?php
    $appName = "T-shirt Store";
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $appName ?><?= isset($title) ? " - $title" : '' ?></title>
    <meta name="description" content="<?= $site_description ?>" />

    <meta property="og:type" content="article" />
    <meta property="og:title" content="<?= $appName ?><?= isset($title) ? " - $title" : '' ?>" />
    <meta property="og:site_name" content="<?= $appName ?>" />
    <?php if(isset($site_description)): ?>
        <meta property="og:description" content="<?= $site_description ?>" />
    <?php endif; ?>
    <meta property="article:author" content="<?= $appName ?>" />

    <meta name="twitter:site" content="<?= $appName ?>" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:creator" content="<?= $appName ?>" />

    <meta name="keywords" content="T-shirt, Vêtements, Produits, Article" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
</head>

<!-- <?php
if (isset($title)) {
    echo $title;
} else {
    echo '';
}
?>

<?= isset($title) ? $title : '' ?>

<?= $appName . ' - ' . $title ?>
<?= "$appName - $title" ?> => T-Sirt Store - Accueil
<?= '$appName - $title' ?> => $appName - $title
 -->
