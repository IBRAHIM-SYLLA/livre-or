<?php
    session_start();
    $bdd = mysqli_connect('localhost', 'root', '', 'livreor');
    mysqli_set_charset($bdd, 'utf8');
    if (isset($_POST['commentaire']) && !empty($_POST['commentaire'])){
        $comment = $_POST['commentaire'];
        date_default_timezone_set('Europe/Paris');
        $date = date('Y-m-d H:i:s');
        $id = $_SESSION['utilisateurs']['id'];
        $requete = mysqli_query($bdd,"INSERT INTO commentaires(commentaire, id_utilisateur, date) VALUES ('$comment', '$id', '$date')");
    }
    if (isset($_POST['comment'])){
        header('Location: livre-or.php');
    }
    if (empty($_SESSION)){
        header('Location: index.php');
        exit();
    }
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
<body>
<header>
    <h1><em>Commentaire</em></h1>
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
        <div class = "centre">
            <div class = "inscription">
                <form action="commentaire.php" method="post">
                            <label for="commentaire">Commentaire</label>
                            <input type="text" id="commentaire" name="commentaire">

                            <input type="submit" name="comment" value="Poster">
                </form>
            </div>
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