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
        $loginError = "Veuillez renseigner votre login";
        echo $loginError;
    }
    //Cherche dans la BDD si le login existe déja.
    elseif(!empty($login)){
        $queryLogin = "SELECT `login`FROM `utilisateurs` WHERE `login` = '$login'";
        $result = mysqli_query($connect, $queryLogin);
        if(mysqli_num_rows($result) > 0){
            $loginNotAvailable = "Le login n'est pas disponible";
            echo $loginNotAvailable;
        }
    }

     //Verifie que les deux password sont identiques
     if (empty($password)){
        $passwordError = "Veuillez renseigner un mot de passe";
        echo $passwordError;
     }
     elseif($password !== $passwordCheck){
         $passwordError2 = "Veuillez renseigner le même mot de passe";
         echo $passwordError2;
         echo "hi";
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
</head>
<body>
    <form method="post" action="">
        <label for="login">Login :</label>
        <input type="text" id="login" name="user_login">
        <label for="prenom">Prenom :</label>
        <input type="text" id="prenom" name="user_prenom">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="user_nom">
        <label for="mdp">Mot de passe :</label>
        <input type="password" id="mdp" name="user_password">
        <label for="mdp2">Confirmez votre mot de passe :</label>
        <input type="password" id="mdp2" name="user_password_check">
        <button type="submit" name="inscription">Inscription</button>
    </form>

    <button><a href="index.php">retour</a></button>
</body>
</html>