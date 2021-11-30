<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="livreor.css">
    <title>Document</title>
</head>
<body>
<header>
    <h1><em>Connexion</em></h1>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="livre-or.php">Livre d'or</a></li>
            <?php
                if(empty($_SESSION)){
                   echo '<li><a href="inscription.php">Inscription</a></li>';
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
        <div class="inscription">
                <?php
                    $bdd = mysqli_connect('localhost','root','','livreor');
                    mysqli_set_charset($bdd, 'utf8');
                    if (!empty($_POST)){
                        if (isset($_POST['login']) && isset($_POST['password']) && !empty($_POST['login']) && !empty($_POST['password'])){
                            $login = $_POST['login'];
                            $password = $_POST['password'];
                            $sql = "SELECT * FROM utilisateurs WHERE login = '$login'";
                            $req = mysqli_query($bdd, $sql);
                            $utilisateurs = mysqli_fetch_all($req, MYSQLI_ASSOC);
                            if (count($utilisateurs) > 0){
                                if(password_verify($password, $utilisateurs[0]['password']) || $password == $utilisateurs[0]['password']){
                                    $_SESSION['utilisateurs'] = [
                                        'id' => $utilisateurs[0]['id'],
                                        'login' => $utilisateurs[0]['login'],
                                        'password' => $utilisateurs[0]['password'],
                                    ];
                                    header('Location: index.php');
                                    exit();
                                }
                            }
                        }
                        else{
                            echo "<h3>login ou password incorrect</h3>";
                        }
                }?>
                    <form action="connexion.php" method="post">
                            <label for="login">Login</label>
                            <input type="text" id="login" name="login">

                            <label for="password">password</label>
                            <input type="password" id="password" name="password">

                            <input type="submit" value="connexion">
                    </form>
                    <p>Si vous n'êtes pas inscrit <a href="inscription.php">inscrivez-vous !</a></p>
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