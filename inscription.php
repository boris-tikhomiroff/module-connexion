<?php
// Démarre le systeme de session
session_start();

// Connexion à la BDD
$connect = mysqli_connect('localhost', 'root','','moduleconnexion');

//Vérifie la connexion à la BDD
if($connect === false){
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
}



// Stock les valeurs renseignées par l'utilisateurs
if(isset($_POST['inscription']))
{
    $login = htmlspecialchars($_POST['user_login']);
    $prenom = htmlspecialchars($_POST['user_prenom']);
    $nom = htmlspecialchars($_POST['user_nom']);
    $password = htmlspecialchars($_POST['user_password']);
    $passworCheck = htmlspecialchars($_POST['user_password_check']);
    
    // Requete SQL
    $query = "INSERT INTO `utilisateurs`(`login`, `prenom`, `nom`, `password`) VALUES ('$login','$prenom','$nom', '$password')";
    
    // Exécute la requête sur la base de données
    $res = mysqli_query($connect, $query);
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
        <input type="text" id="login" name="user_login" required>
        <label for="prenom">Prenom :</label>
        <input type="text" id="prenom" name="user_prenom" required>
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="user_nom" required>
        <label for="mdp">Mot de passe :</label>
        <input type="password" id="mdp" name="user_password" required>
        <label for="mdp2">Confirmez votre mot de passe :</label>
        <input type="password" id="mdp2" name="user_password_check" required>
        <button type="submit" name="inscription">Inscription</button>
    </form>
</body>
</html>