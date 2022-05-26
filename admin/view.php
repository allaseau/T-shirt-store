<!DOCTYPE html>
<html lang="fr">
<?php $title="Admin"; $site_description="Admin"; require "../head.php"; ?>
<body>
    <?php require "../header.php"; ?>
    <h1>You are connected <?= $_SESSION['login']['firstName'] ?> <?= $_SESSION['login']['lastName'] ?> !!!</h1>
    
    <a href="../create_article">Créer un article</a>

    <form action="" method="POST">
        <input type="submit" name="logout" value="Logout" class="btn btn-danger" />
    </form>
    <?php require "../footer.php"; ?>
</body>
</html>
