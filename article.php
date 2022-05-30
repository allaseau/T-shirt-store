<?php
require_once("./utils/init.php");
require_once("./model/article.php");

$article = get_article_by_id($_GET['id']);
?>

<?php require_once('./components/head.php'); ?>

<body>
    <?php require_once('./components/header.php'); ?>

    <main>
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <div class="col-md-4 mb-4">
                    <article class="card">
                        <img src="<?= $article['image']; ?>" alt="Image de <?= $article['nom']; ?>" class="card-img-top" />
                        <div class="card-body">
                            <h5 class="card-title"><?= $article['nom'] ?></h5>
                            <p class="card-text"><?= $article['createur'] ?></p>
                            <p class="card-text"><?= $article['prix'] ?>€</p>
                            <p class="card-text"><?= $article['description'] ?></p>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </main>

    <?php require_once('./components/footer.php'); ?>
</body>

</html>