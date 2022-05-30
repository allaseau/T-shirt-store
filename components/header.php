<?php
global $root_path;
global $folder_root;

require_once($root_path . '/model/categorie.php');

$categories = get_categories();

?>

<header>
    <a href="<?= $folder_root ?>index.php">
        <img class="logo" src="<?= $folder_root ?>static/img/logo1.png" alt="Logo Store"/>
    </a>
    <nav>
        <div id="wrap">
            <ul class="navbar">
                <li>
                    <a href="<?= $folder_root ?>index.php">Accueil</a>
                </li>
                <li>
                    <a href="<?= $folder_root ?>index.php">Catégories</a>
                    <ul>
                        <?php foreach ($categories as $c) : ?>
                            <li><a href="<?= $folder_root ?>categorie.php?id=<?= $c['id'] ?>"><?= $c['nom'] ?></a></li>
                        <?php endforeach ?>
                    </ul>
                </li>
                <li>
                    <a href="<?= $folder_root ?>contact.php">Contact</a>
                </li>
                <?php if (!isset($_SESSION['login'])) : ?>
                    <li>
                        <a href="<?= $folder_root ?>login.php">Login</a>
                    </li>
                <?php else: ?>
                    <li>
                        <a href="<?= $folder_root ?>admin.php">Admin</a>
                    </li>
                    <li>
                        <a href="<?= $folder_root ?>logout.php">Logout</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
</header>