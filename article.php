<?php
require_once("./utils/init.php");
require_once("./model/article.php");

$article = get_article_by_id($_GET['id']);
?>

<?php require_once('./components/head.php'); ?>

<body>
<?php require_once('./components/header.php'); ?>

<main>
    <div class="col-md-4 mb-4">
        <a href="./article.php?id=<?= $article['id'] ?>">
            <article class="card">
                <img src="<?= $article['image']; ?>" alt="Image de <?= $article['nom']; ?>" class="card-img-top"/>
                <div class="card-body">
                    <h5 class="card-title"><?= $article['nom'] ?></h5>
                    <p class="card-text"><?= $article['createur'] ?></p>
                    <p class="card-text"><?= $article['prix'] ?>€</p>
                    <p class="card-text"><?= $article['description'] ?></p>
                </div>
            </article>
        </a>
    </div>
</main>

<?php require_once('./components/footer.php'); ?>
</body>

</html>