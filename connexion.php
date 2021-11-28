<?php
session_start();

$bdd = mysqli_connect('localhost','root','','moduleconnexion');
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
                        else{
                            echo "<h3>login ou password incorrect</h3>";
                        }
                    }
                }?>
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
        <div class="inscription">
                    <form action="connexion.php" method="post">
                            <label for="login">Login</label>
                            <input type="text" id="login" name="login">

                            <label for="password">password</label>
                            <input type="password" id="password" name="password">

                            <input type="submit" value="connexion">
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