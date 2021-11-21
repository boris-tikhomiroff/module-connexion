<?php
session_start();
date_default_timezone_set('Europe/Paris');
// var_dump($_SESSION);

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
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">
</head>
<body>
    <div class="signature">
        <p>Boris Tikhomiroff</p>
        <img src="./Images/timer.png" alt="">
    </div>
    <div class="marquee">
        <div class="currentDate">
            <?php
                $date = date("D M j G:i T Y");
                echo $date;
            ?>
        </div>
    </div>
    <header class="headerAccueil">
        <div class="stack1"></div>
        <div class="stack2"></div>
        <nav class="navBar">
            <div class="icon">
                <img class="icon_img" src="./Images/search.png" alt="">
                <img class="icon_img" src="./Images/redo.png" alt="">
                <img class="icon_img" src="./Images/arrow.png" alt="">
            </div>
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
                <?php if(!empty($_SESSION)){
                    echo ('
                    <li><form action="" method="post"><input type="submit" name="deconnexion" value="deconnexion"></form></li>
                    <li><a href="profil.php">Profil</a></li>

                    ');
                }
                ?>
                <?php
                if(isset($_SESSION['admin'])){
                    echo '<li><a href="admin.php">admin</a></li>';
                }
                ?>
            </ul>
        </nav>
        <div class="cta">
            <h1 class="cta_title">GO!</h1>
            <img src="./Images/kisspng-starburst-free-content-clip-art-burst-cliparts-5aa9a4c161c043.2772326815210672014004.png"  class="starbust" alt="">
        </div>
    </header>
    <main>
    </main>
    <footer>

    </footer>
</body>
</html>



