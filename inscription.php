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
    <h1><em>Inscription</em></h1>
    <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="livre-or.php">Livre d'or</a></li>
            <?php
                if(empty($_SESSION)){
                   echo '<li><a href="connexion.php">Connexion</a></li>';
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
                if (isset($_POST['login']) && isset($_POST['password'])){
                    $login = $_POST['login'];
                    $password = $_POST['password'];
                        if ($password == $_POST['passconf']){
                            $veriflogin = mysqli_query($bdd,"SELECT login FROM utilisateurs WHERE login = '$login'");
                            $resultat = mysqli_fetch_all($veriflogin);
                                if(count($resultat) == 0){
                                    $password = password_hash($password, PASSWORD_BCRYPT);
                                    $requete = mysqli_query($bdd,"INSERT INTO utilisateurs (login, password) VALUES ('$login', '$password')");
                                    header('Location: connexion.php');
                                }
                                else {
                                    echo "<h3>Login déjà utilisé !!!</h3>";
                                }
                        }
                        else
                        {
                            echo '<h3>*Les mot de passes doivent êtres identiques !!!</h3>';
                        }
                }
            ?>
                <form action="inscription.php" method="post">
                        <label for="login">Login</label>
                        <input type="text" id="login" name="login">

                        <label for="password">password</label>
                        <input type="password" id="password" name="password">

                        <label for="passconf">passeword confirmation</label>
                        <input type="password" id="passconf" name="passconf">

                        <input type="submit" value="inscription">
                </form>
                <p>Si vous êtes déja inscrit <a href="connexion.php">connecter vous !</a></p>
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