<?php
session_start();
var_dump($_SESSION);

if(isset($_POST['deconnexion'])){
    session_destroy();
    echo "Vous êtes à présent déconnecté !";
    header('Location: connexion.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'accueil de mon site</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <?php
                if(empty($_SESSION))
                {
                    echo ('
                    <li><a href="inscription.php">Inscription</a></li>
                    <li><a href="connexion.php">Connexion</a></li>
                    ');
                }
                ?>
                <li><a href="profile.php">Profil</a></li>
                <?php if(!empty($_SESSION)){
                    echo '<form action="" method="post"><input type="submit" name="deconnexion" value="deconnexion"></form>';
                }
                ?>
            </ul>
        </nav>
    </header>
</body>
</html>



