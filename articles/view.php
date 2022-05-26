<?php include "../vendors/autoload.php"; ?>
<?php require_once "../helpers/form-helper.php"; ?>

<!DOCTYPE html>
<html lang="fr">
<?php $title="Articles"; $site_description="Vous pouvez trouver ici la liste de nos articles"; require "../head.php"; ?>
<body>
    <?php require "../header.php"; ?>

    <div class="container mt-3">
        <div class="row">
            <?php foreach($articles_list as $article): ?>
                <div class="col-md-4 mb-4">
                    <article class="card">
                        <?php if(isset($article['image'])): ?>
                            <img class="card-img-top"
                                src="<?= $article["image"] ?>"
                                alt="Image of <?= $article["title"] ?>" />
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title"><?= $article["title"] ?></h5>
                            <time class="card-subtitle"><?= date_format($article["creationDate"], "d/m/Y") ?></time>
                            <?php
                                try {
                                    $quill = new \DBlackborough\Quill\Render($article["content"]);
                                    $content = $quill->render();
                                } catch(Exception $e) {
                                    $content = $article["content"];
                                }
                            ?>
                            <p class="card-text"><?= $content ?></p>
                        </div>
                    </article>
                </div>
            <?php endforeach; ?>
        </div>
        <div>
            <?php if ($page > 1): ?>
                <a href="<?=getSelfUrl()?>?page=<?=$page-1?>" class="float-left btn btn-success">Précedent</a>
            <?php endif; ?>
            <?php if (count($articles_list) === ROW_PER_PAGE): ?>
                <a href="<?=getSelfUrl()?>?page=<?=$page+1?>" class="float-right btn btn-success">Suivant</a>
            <?php endif; ?>
        </div>
    </div>

    <?php

        $nbr = 15;
        function expose($nbr, $exp) {
            $result = $nbr;

            for($i = 0; $i < ($exp - 1); $i++) {
                $result = $result * $nbr;
            }
  
            return $result;
        }

        $number_to_expose = 5;
        $exponant_to_apply = 20;

        $result = expose($number_to_expose, $exponant_to_apply);
        // echo $result;
        // echo '</br>';
        
        // echo expose(10, 3);
    ?>

    <?php require "../footer.php"; ?>
</body>
</html>
