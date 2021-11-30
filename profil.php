<?php
    session_start();
    $id = $_SESSION['utilisateurs']['id'];
    $bdd = mysqli_connect('localhost','root','','livreor');
    mysqli_set_charset($bdd, 'utf8');

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="livreor.css">
        <title>Profil</title>
    </head>
    <body>
            <header>
                <h1><em>Mon Profil</em></h1>
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
                    <div class ="inscription">
                        <?php
                            if(isset($_POST['submitProfil'])){
                                if(isset($_POST['login']) && isset($_POST['password'])){
                                    $login_update =  $_POST['login'];
                                    $password_update =  $_POST['password'];
                                    $password_hash = password_hash($password_update, PASSWORD_BCRYPT);
                                    $requete2 = "UPDATE utilisateurs SET login = '$login_update', password = '$password_hash' WHERE id = '$id'";
                                    $reponse = $bdd->query($requete2);
                                    $_SESSION['utilisateurs']['login']= $login_update;
                                    $_SESSION['utilisateurs']['password']= $password_hash;
                                    $message = '<h3>Bravo ! Profil mis a jour !</h3>';
                                    echo $message;
                                }
                            }
                        ?>
                                    <form action="profil.php" method="post">
                                        <label for="login">Login</label>
                                        <input type="text" id="login" name="login" value="<?php echo $_SESSION['utilisateurs']['login']; ?>">

                                        <label for="password">Password</label>
                                        <input type="password" id="password" name="password">

                                        <input type="submit" name='submitProfil' value="mettre a jour">
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