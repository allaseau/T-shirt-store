<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/tshirt-store/model/categorie.php');

$categories = get_categories();

?>

<header>
        <a href="index.php">
            <img class="logo" src="/tshirt-store/static/img/logo1.png" alt="Logo Store" />
        </a>
        <nav>
            <div id="wrap">
                <ul class="navbar">
                    <li>
                        <a href="/tshirt-store/index.php">Accueil</a>
                    </li>
                    <li>
                        <a href="/tshirt-store/index.php">Catégories</a>
                        <ul> 
                        <?php foreach($categories as $c) : ?>
                            <li><a href="/tshirt-store/categorie.php?id=<?= $c['id'] ?>"><?= $c['nom'] ?></a></li>
                        <?php endforeach ?>
                        </ul>
                    <li>
                        <a href="/tshirt-store/aboutus.php">About Us</a>
                    </li>
        </nav>
    </header>