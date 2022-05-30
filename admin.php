<?php
require_once("./utils/init.php");

prevent_not_connected();
?>

<?php require_once('./components/head.php'); ?>

<body>
    <?php require_once('./components/header.php'); ?>

    <main>
        <?= isset($_GET['message']) && $_GET['message'] === 'added' ? "Votre article a bien été créé" : "" ?>
        <a href="./admin/add_article.php"><button>Ajouter un article</button></a>
        <a href="./admin/contact_list.php"><button>Voir les messages</button></a>
    </main>

    <?php require_once('./components/footer.php'); ?>
</body>

</html>