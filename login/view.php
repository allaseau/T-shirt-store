<!DOCTYPE html>
<html lang="fr">
<?php $title="Login"; $site_description="Login"; require "../head.php"; ?>
<body>
    <?php require "../header.php"; ?>

    <div class="container">
        <div class="form-container">
            <form
                action=""
                method="POST">
                <h2 class="text-center"><strong>Welcome back !</strong></h2>
                <div class="form-group">
                    <label>
                        Username
                        <input
                            class="form-control"
                            type="text"
                            name="username"
                            placeholder="Username" />
                    </label>
                </div>
                <div class="form-group">
                    <label>
                        Password
                        <input
                            class="form-control"
                            type="password"
                            name="password"
                            placeholder="Password" />
                    </label>
                </div>
                <?php if($hasError): ?>
                    <p class="text-danger">Problème de connexion. Veuillez réessayer.</p>
                <?php endif; ?>
                <div class="form-group">
                    <button type="submit" class="btn btn-success" >Login</button>
                </div>
            </form>
        </div>
    </div>

    <?php require "../footer.php"; ?>
</body>
</html>
