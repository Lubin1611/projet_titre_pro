<?php
/**
 * Created by PhpStorm.
 * User: Lubin
 * Date: 13/05/2019
 * Time: 23:06
 */

$token = $_GET['token'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Votre site de révisions</title>
    <script src="lib/jquery.js"></script>
    <link rel="stylesheet" href="bootstrap/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="Css/stylr.css">
    <link rel="stylesheet" type="text/css" href="Css/style_newpass.css">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
</head>
<body>

<header>
    <div id='container_btn'>
        <div id="btn_menu">Menu</div>
    </div>
    <div id='box_titre'>
        <div id='titre_site'>
            <h1>Page d'accueil</h1>
        </div>
        <div id="connection">
            <?php
            if (isset($_SESSION['rang']) and $_SESSION['rang'] == 0 || $_SESSION['rang'] == 1) {
                ?>

                <p>Bienvenue, <?php echo $_SESSION['nom'];
                    echo $_SESSION['prenom']; ?>
                </p>
                <a href="index.php?controler=users&action=deconnection">Se déconnecter</a>
                <?php
            } else {
            ?>
            <div id='redir_connect'>
                <a href="index.php?controler=users&action=vueConnection">Connectez-vous</a>
            </div>
            <div id="redir_signup">
                <a href="index.php?controler=users&action=vueInscription">Inscrivez-vous ici</a>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
</header>

<div class="container_page">
    <div class="menu">
        <div id="sidebar">
            <ul>
                <li><a id="bloc1" href='index.php?'>Accueil</a></li>
                <li><a id="bloc2" href='index.php?controler=jeux&action=entrainement'>Jeu 1</a></li>
                <li><a id="bloc3" href='index.php?controler=jeux&action=jeuMots'>Jeu 2</a></li>
                <li><a id="bloc5" href='index.php?controler=jeux&action=quizz'>Jeu 3</a></li>
                <?php

                if (isset($_SESSION['rang']) and $_SESSION['rang'] == 0) {

                    ?>

                    <li><a id="bloc4" href='index.php?controler=users&action=espaceMembres'>Membres</a></li>

                    <?php

                } else if (isset($_SESSION['rang']) and $_SESSION['rang'] == 1) { ?>

                    <li><a id="bloc4" href='index.php?controler=users&action=panelAdmin'>Admin</a></li>

                    <?php
                } else {
                    ?>

                    <?php
                }
                ?>
            </ul>
        </div>
        <div><a id="btn">X</a></div>
    </div>

    <div class="container_redefinition">

        <div id='redefinition'>
            <span><?php if (isset($message)) echo $message; ?></span>
            <h1>Nouvelle demande de mot de passe</h1>

            <form action="index.php?controler=users&action=newmdp&jeton=<?php echo $token ?>" method="post">

                <label>Indiquez un nouveau mot de passe : </label><input type="password" name="newpass" id='newpass'>
                <label>Confirmez votre mot de passe : </label><input type="password" name="confirmpass"
                                                                     id='confirmpass'>
                <input type="submit" value="envoyez" id = 'verification'>
            </form>

        </div>
    </div>
</div>


    <script src="Js/java.js"></script>
</body>
</html>
