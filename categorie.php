<?php
require_once("./utils/init.php");
require_once("./model/article.php");

$articles = get_categorie_articles($_GET['id']);
?>

<?php require_once('./components/head.php'); ?>

<body>
    <?php require_once('./components/header.php'); ?>

    <main>
        <section class="container mt-3">
            <div class="row">
                <?php foreach ($articles as $a) : ?>
                    <div class="col-md-4 mb-4">
                        <a href="./article.php?id=<?= $a['id'] ?>">
                            <article class="card">
                                <img src="<?= $a['image']; ?>" alt="Image de <?= $a['nom']; ?>" class="card-img-top" />
                                <div class="card-body">
                                    <h5 class="card-title"><?= $a['nom'] ?></h5>
                                    <p class="card-text"><?= $a['createur'] ?></p>
                                    <p class="card-text"><?= $a['prix'] ?>€</p>
                                </div>
                            </article>
                        </a>
                    </div>
                <?php endforeach ?>
            </div>
        </section>

    </main>

    <?php require_once('./components/footer.php'); ?>
</body>

</html>