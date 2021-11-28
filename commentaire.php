<?php
    session_start();
    $bdd = mysqli_connect('localhost', 'root', '', 'livreor');
    mysqli_set_charset($bdd, 'utf8');
    if (isset($_POST['commentaire']) && !empty($_POST['commentaire'])){
        $comment = $_POST['commentaire'];
        $date = date('Y-m-d H:i:s');
        $id = $_SESSION['utilisateurs']['id'];
        $requete = mysqli_query($bdd,"INSERT INTO commentaires(commentaire, id_utilisateur, date) VALUES ('$comment', '$id', '$date')");
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
    <h1><em>Demon Slayer</em></h1>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="inscription.php">Inscription</a></li>
            <li><a href="connexion.php">Connexion</a></li>'
            <li><a href="commentaire.php">Commentaire</a></li>
            <li><a href="livre-or.php">Livre d'or</a></li>
            <li><a href="profil.php">Mon profil</a></li>
        </ul>
    </header>
    <main>
        <div class = "commentaire">
            <form action="commentaire.php" method="post">
                        <label for="commentaire">Commentaire</label>
                        <input type="text" id="commentaire" name="commentaire">

                        <input type="submit" value="Poster">
            </form>
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