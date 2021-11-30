<?php
session_start()
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
    <h1><em>Le livre d'or</em></h1>
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
            $bdd = mysqli_connect('localhost', 'root', '', 'livreor');
            mysqli_set_charset($bdd, 'utf8');
            $requete = mysqli_query($bdd, "SELECT * FROM utilisateurs INNER JOIN commentaires WHERE utilisateurs.id = commentaires.id_utilisateur ORDER BY commentaires.date DESC");
            $comment = mysqli_fetch_all($requete, MYSQLI_ASSOC);
                foreach($comment as $valeur => $commentaires){
                    echo '<div id ="table">
                                    <table>
                                    <thead>
                                        <tr>
                                            <th>'.$commentaires['login'].'</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <td>'. $commentaires['commentaire'].' '.'Poster le'.' '.date_format(date_create($commentaires['date']), 'd/m/Y H:i:s').'</td>
                                    </tbody>
                                </table>
                            </div>';
                }
                if(empty($_SESSION)){
                    echo '  <div class="centre">
                                <a href="connexion.php"><input id ="livre" type="submit" name= submit value="connecter vous ou inscrivez-vous pour poster un commentaires"></a>
                            </div>';
                }
                else{
                    echo   '<div class="centre">
                                <a href="commentaire.php"><input id ="livre" type="submit" name= submit value="Poster un commentaires"></a>
                            </div>';
                }
        ?>
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