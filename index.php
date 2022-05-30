<?php
require_once("./utils/init.php");
require_once("./model/categorie.php");
$latest = getLatestArticles();
$random = getRandomArticles();
/**/

?>

<?php require_once('./components/head.php'); ?>

<body>
    <?php require_once('./components/header.php'); ?>

    <main>
        <section class="container mt-3">
            <div class="row">
                <?php foreach ($latest as $l) : ?>
                    <div class="col-md-4 mb-4">
                        <article class="card">
                            <img src="<?= $l['Img'];?>" alt="Image de <?= $l['Nom'];?>" class="card-img-top" />
                            <div class="card-body">
                                <a href="">
                                    <h5 class="card-title"></h5>
                                </a>
                                <p class="card-text"></p>
                                <p class="card-text">€</p>
                            </div>
                        </article>
                    </div>
                <?php endforeach ?>
            </div>
        </section>
                

    <section class="container mt-3">
        <div class="row">
            <?php foreach ($random as $r) : ?>
                <div class="col-md-4 mb-4">
                    <article class="card">
                    <img src="<?= $r['Img'];?>" alt="Image de <?= $r['Nom'];?>" class="card-img-top" />
                        <div class="card-body">
                            <a href="">
                                <h5 class="card-title"></h5>
                            </a>
                            <p class="card-text"></p>
                            <p class="card-text">€</p>
                        </div>
                    </article>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
            
    </main>

    <?php require_once('./components/footer.php'); ?>
</body>

</html>