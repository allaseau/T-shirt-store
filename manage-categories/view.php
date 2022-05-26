<!DOCTYPE html>
<html lang="fr">
<?php $title="Manage categories"; $site_description="Manage categories"; require "../head.php"; ?>
<body>
    <?php require "../header.php"; ?>
    
    <div class="container">
        <h2>Catégories</h2>

        <?php foreach($_SESSION['categories'] as $category): ?>
            <form class="card mb-4" action="" method="POST">
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-9">
                            <input type="hidden"
                                name="id"
                                value="<?= $category['id'] ?>" />
                            <input type="text"
                                class="form-control"
                                name="name"
                                maxlength="50"
                                value="<?= $category['name'] ?>" />
                        </div>
                        <div class="col-3">
                            <input type="submit"
                                value="Sauver"
                                name="save"
                                class="btn btn-primary" />
                            <input type="submit"
                                value="Supprimer"
                                name="delete"
                                class="btn btn-danger" />

                        </div>
                    </div>
                </div>
            </form>
        <?php endforeach; ?>

        <form method="POST" action="" class="card mt-5">
            <div class="card-body">
                <h5 class="card-title">Création</h5>
                <div class="row">
                    <div class="form-group col-11 mb-0">
                        <input type="text"
                            name="name"
                            class="form-control"
                            placeholder="Entre un nom de catégorie"
                            maxlength="50"
                            required />
                    </div>
                    <div class="col-1">
                        <input type="submit"
                            value="Créer"
                            name="create"
                            class="btn btn-success" />
                    </div>
                </div>
            </div>
        </form>


    </div>

    <?php require "../footer.php"; ?>
</body>
</html>
