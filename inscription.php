<?php
// Démarre le systeme de session
session_start();

// Connexion à la BDD
$connect = mysqli_connect('localhost', 'root','','moduleconnexion');
mysqli_set_charset($connect, 'utf8');

//Vérifie la connexion à la BDD
if($connect === false){
    die("ERREUR : Impossible de se connecter à la Base de données. " . mysqli_connect_error());
}
// Redirige vers la page de profile si une session est déja active
if(isset($_SESSION['login'])) {
    header('Location: index.php');
    // exit();
}
// Stock les valeurs renseignées par l'utilisateurs
if(isset($_POST['inscription']))
{
    $login = htmlspecialchars($_POST['user_login']);
    $prenom = htmlspecialchars($_POST['user_prenom']);
    $nom = htmlspecialchars($_POST['user_nom']);
    $password = htmlspecialchars($_POST['user_password']);
    $passwordCheck = htmlspecialchars($_POST['user_password_check']);    
    $hashpassword = password_hash($password, PASSWORD_DEFAULT);

    
    // Si login n'est pas renseigné, afficher une erreur.
    if(empty($login)){
        $loginError = "*Veuillez renseigner votre login";
        // echo $loginError;
    }
    //Cherche dans la BDD si le login existe déja.
    elseif(!empty($login)){
        $queryLogin = "SELECT `login`FROM `utilisateurs` WHERE `login` = '$login'";
        $result = mysqli_query($connect, $queryLogin);
        if(mysqli_num_rows($result) > 0){
            $loginNotAvailable = "*Le login n'est pas disponible";
            // echo $loginNotAvailable;
        }
    }

     //Verifie que les deux password sont identiques
     if (empty($password)){
        $passwordError = "*Veuillez renseigner un mot de passe";
        // echo $passwordError;
     }
     elseif($password !== $passwordCheck){
         $passwordError2 = "*Veuillez renseigner le même mot de passe";
        //  echo $passwordError2;
        //  echo "hi";
     }

    // Si tout les testes sont passées, envoi la requete
    else {
        // Requete SQL : envoi les données dans BDD
        $query = "INSERT INTO `utilisateurs`(`login`, `prenom`, `nom`, `password`) VALUES ('$login','$prenom','$nom', '$hashpassword')";
        $requestAddUser = mysqli_query($connect, $query);
        header('Location: connexion.php');
        echo "ok";
        var_dump($_POST);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon site || Formulaire d'inscription</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">
</head>
<body>
<header>
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
    </header>
    <main class="inscription_main main">
        <form method="post" action="" class="form inscription">
            <h1>Inscription</h1>
            <div>
                <label for="login"></label>
                <input type="text" id="login" name="user_login" placeholder="Login">
                <span class="error"><?php if (isset($loginError)) echo '<br/>'.$loginError?></span>
                <span class="error"><?php if (isset($loginNotAvailable)) echo '<br/>'.$loginNotAvailable?></span>
            </div>

            <div>
                <label for="prenom"></label>
                <input type="text" id="prenom" name="user_prenom" placeholder="Prenom">
            </div>

            <div>
                <label for="nom"></label>
                <input type="text" id="nom" name="user_nom" placeholder="Nom">
            </div>

            <div>
                <label for="mdp"></label>
                <input type="password" id="mdp" name="user_password" placeholder="mot de passe">
                <span class="error"><?php if (isset($passwordError)) echo '<br/>'.$passwordError?></span>
            </div>

            <div>
                <label for="mdp2"></label>
                <input type="password" id="mdp2" name="user_password_check" placeholder="Confirmez votre mot de passe">
                <span class="error"><?php if (isset($passwordError2)) echo '<br/>'.$passwordError2?></span>
            </div>
            
            <button type="submit" name="inscription" class="inscription_btn">Inscription</button>
        </form>
        <nav class="inscription_nav">
            <button ><a href="index.php">retour</a></button>
        <nav>
    </main>
</body>
</html>