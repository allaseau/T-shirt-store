<?php
    require_once("./utils/init.php");
    require_once("./model/user.php");

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $user = get_user_by_email(sanitize_input($_POST['mail']));
        if ($user) {
            if (hash("sha256", sanitize_input($_POST['password'])) === $user['Password']) {
                $_SESSION['login'] = [
                    'nom' => $user['Nom'],
                    'prenom' => $user['Prenom'],
                    'mail' => $user['Adresse_mail'],
                ];

                $redirect = isset($_GET['redirect']) ? urldecode($_GET['redirect']) : './admin.php' ;
                redirect($redirect);
            } else {
                $error_message = "Inccorect credentials";
            }
        } else {
            $error_message = "User not found";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./static/css/style.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>T-shirt Store</title>
</head>

<body>
    <header>
        <a href="index.php">
            <img class="logo" src="./static/img/logo1.png" alt="Logo Store" />
        </a>
        <nav>
            <div id="wrap">
                <ul class="navbar">
                    <li>
                        <a href="./index.php">Accueil</a>
                    </li>
                    <li>
                        <a href="./index.php">Catégories</a>
                        <ul>
                            <li><a href="./catgorie_geek.php">Geek</a></li>
                            <li><a href="./categorie_fun.php">Fun</a></li>
                            <li><a href="./categorie_cine.php">Cinéma</a></li>
                        </ul>
                    <li>
                        <a href="./aboutus.php">About Us</a>
                    </li>
        </nav>
    </header>
    <main>
        <form method="POST">
            <label for="mail">E-mail</label>
            <input type="text" name="mail" value="<?= isset($_POST['mail']) ? $_POST['mail'] : "" ?>"><br/>
            <label for="pass">Password</label>
            <input type="password" name="password"><br/>
            <button type="submit">Connection</button>
        </form>
        <?= isset($error_message) ? $error_message : "" ?>
    </main>
    <footer>
        <footer>
            <div class="lower__container">
                <section class="footer__nav">
                    <div>
                        <a href="index.php">
                            <img class="logo__foot" src="./static/img/logo1.png" alt="Logo Store" />
                        </a>
                        <nav>
                            <ul>
                                <li><a href="index.php">Accueil</a></li>
                                <li><a href="catgories.php">Catégories</a></li>
                                <li><a href="aboutus.php">About Us</a></li>
                            </ul>
                        </nav>
                    </div>
                </section>
                <div class="inline__lower__container">
                    <section>
                        <div class="info__address">
                            <h3>T-shirt Store Central Office</h3>
                            <p>
                                386 Wellington Street <br />
                                1000 Brussels - Belgium
                            </p>
                        </div>
                        <div class="info__contact">
                            <h3>Contact Us (Central Office)</h3>
                            <p>
                                P : +1 234-567-89 <br />
                                M : contact@tstore.co
                            </p>
                        </div>
                    </section>
                    <section class="section__media">
                        <ul>
                            <li><i class="fa-brands fa-facebook-square"></i></li>
                            <li><i class="fa-brands fa-youtube-square"></i></li>
                            <li><i class="fa-brands fa-twitter"></i></li>
                            <li><i class="fa-brands fa-pinterest"></i></li>
                            <li><i class="fa-brands fa-instagram"></i></li>
                        </ul>
                    </section>
                </div>
            </div>
        </footer>
</body>

</html>