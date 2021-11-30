<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href="livreor.css">
    <title>Document</title>
</head>
<body id="accueil">
<header>
    <h1><em>Demon Slayer</em></h1>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="livre-or.php">Livre d'or</a></li>
            <?php
                if(empty($_SESSION)){
                   echo '<li><a href="inscription.php">Inscription</a></li>
                    <li><a href="connexion.php">Connexion</a></li>';
                }
                else{
                    echo '<li><a href="commentaire.php">Commentaire</a></li>
                    <li><a href="profil.php">Mon profil</a></li>
                    <li><a href="deconnexion.php">Deconnexion</a></li>';
                }
            ?>
        </ul>
    </header>
    <main>
        <?php
        if(!empty($_SESSION)){
            echo "<p id='bonjour'>Bonjour ".$_SESSION['utilisateurs']['login'].", vous êtes connectés".'</p>';
        }
        ?>
    <div class="gallimg">
            <img src="image/1.jpg" alt="">
            <img src="image/2.jpg" alt="">
            <img src="image/3.jpg" alt="">
            <img src="image/4.jpg" alt="">
            <img src="image/5.jpg" alt="">
            <img src="image/6.jpg" alt="">
            <img src="image/7.png" alt="">
            <img src="image/8.jpg" alt="">
        </div>
            <div class="centre">
                <a href="livre-or.php"><input id ="livre" type="submit" name='submit' value="Les internautes commente Demon Slayer"></a>
            </div>
    </main>
    <footer>
            <div>
            <p class="footerh1">Suivez nous !</p>
                <div class="rs">
                    <img class="icone" src="image/facebook.svg" alt="" height="64px">
                    <p>Facebook</p>
                </div>
                <div class="rs">
                    <img class="icone" src="image/instagram.svg" alt="" height="64px">
                    <p>Instagram</p>
                </div>
            </div>
            <div>
            <p class="footerh1">Github</p>
            <a href="https://github.com/IBRAHIM-SYLLA/livre-or.git" target="_blank"><p>Livre-or</p></a>
        </div>
    </footer>
</body>
</html>