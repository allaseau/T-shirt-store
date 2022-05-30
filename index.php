<?php
require_once("./utils/init.php");
require_once("./model/article.php");

global $folder_root;

$new_articles = get_newest_articles();
$random_articles = get_random_articles();

?>

<?php require_once('./components/head.php'); ?>

<body>
<?php require_once('./components/header.php'); ?>

<main>
    <section class="container mt-3">
        <div class="row">
            <?php foreach ($new_articles as $n) : ?>
                <div class="col-md-4 mb-4">
                    <a href="./article.php?id=<?= $n['id'] ?>">
                        <article class="card">
                            <img src="<?= $n['image']; ?>" alt="Image de <?= $n['nom']; ?>" class="card-img-top"/>
                            <div class="card-body">
                                <h5 class="card-title"><?= $n['nom']?></h5>
                                <p class="card-text"><?= $n['createur']?></p>
                                <p class="card-text"><?= $n['prix']?>€</p>
                            </div>
                        </article>
                    </a>
                </div>
            <?php endforeach ?>
            <?php foreach ($random_articles as $r) : ?>
                <div class="col-md-4 mb-4">
                    <a href="./article.php?id=<?= $r['id'] ?>">
                        <article class="card">
                            <img src="<?= $r['image']; ?>" alt="Image de <?= $r['nom']; ?>" class="card-img-top"/>
                            <div class="card-body">
                                <h5 class="card-title"><?= $r['nom']?></h5>
                                <p class="card-text"><?= $r['createur']?></p>
                                <p class="card-text"><?= $r['prix']?>€</p>
                            </div>
                        </article>
                    </a>
                </div>
            <?php endforeach ?>
    </section>
</main>

<?php require_once('./components/footer.php'); ?>
</body>

</html>