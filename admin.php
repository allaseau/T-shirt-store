<?php
require_once("./utils/init.php");

prevent_not_connected();
?>

<?php require_once('./components/head.php'); ?>

<body>
    <?php require_once('./components/header.php'); ?>

    <main>
        <a href="./admin/add_article.php"><button>Ajouter un article</button></a>
    </main>

    <?php require_once('./components/footer.php'); ?>
</body>

</html>