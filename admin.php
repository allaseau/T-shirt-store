<?php
require_once("./utils/init.php");

prevent_not_connected();
?>

<?php require_once('./components/head.php'); ?>

<body>
    <?php require_once('./components/header.php'); ?>

    <main>
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <?= isset($_GET['message']) && $_GET['message'] === 'added' ? "Votre article a bien été créé" : "" ?>
                <a href="./admin/add_article.php"><button>Ajouter un article</button></a>
                <a href="./admin/contact_list.php"><button>Voir les messages</button></a>
            </div>
        </div>
    </main>

    <?php require_once('./components/footer.php'); ?>
</body>

</html>