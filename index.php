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
    <title>Mon site || Accueil</title>
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
        <article class="mosaic">
            <section class="mosaic_gallery acid_house">
                <img src="./Images/acid_house.jpg" alt="">
            </section>
            <div class="stack1_mosaic1"></div>
            <div class="stack2_mosaic1"></div>

            <section class="mosaic_gallery deux">
                <img src="./Images/kruger.png" alt="">
            </section>
            <div class="stack1_mosaic2"></div>
            <div class="stack2_mosaic2"></div>

            <section class="mosaic_gallery trois">
            <img src="./Images/ms_20_synth.jpg" alt="">
            </section>
            <div class="stack1_mosaic3"></div>
            <div class="stack2_mosaic3"></div>

            <section class="mosaic_gallery quatre">
                <img src="./Images/herbie.png" alt="">
            </section>
            <div class="stack1_mosaic4"></div>
            <div class="stack2_mosaic4"></div>

            <section class="mosaic_gallery cinq">
                <img src="./Images/disco_70s.jpg" alt="">
            </section>
            <div class="stack1_mosaic5"></div>
            <div class="stack2_mosaic5"></div>

            <section class="mosaic_gallery six">
                <img src="./Images/kraftwerk.jpg" alt="">
            </section>
            <div class="stack1_mosaic6"></div>
            <div class="stack2_mosaic6"></div>

            <section class="mosaic_gallery sept">
                <img src="./Images/tiger.jpg" alt="">
            </section>
            <div class="stack1_mosaic7"></div>
            <div class="stack2_mosaic7"></div>

            <section class="mosaic_gallery tv">
                <img src="./Images/vintage_tv.jpg" alt="">
            </section>
            <div class="stack1_mosaic8"></div>
            <div class="stack2_mosaic8"></div>

            <section class="mosaic_gallery neuf">
                <img src="./Images/psychedelic.jpg" alt="">
            </section>
            <div class="stack1_mosaic9"></div>
            <div class="stack2_mosaic9"></div>
        </article>
        <article class="github">
            <section>
                <a href="https://github.com/boris-tikhomiroff/module-connexion" target ="_blank">GITHUB</a>
                <img src="./Images/chat-pixel.png" alt="">
            </section>
        </article>
    </header>
    <!-- <main></main> -->
    <footer class="footer">
    </footer>
</body>
</html>



