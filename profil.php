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
if(!isset($_SESSION['user'])) {
    header('Location: connexion.php');
    // exit();
}
// Stockage des variables de session
$login = $_SESSION['user']['login'];
$prenom = $_SESSION['user']['prenom'];
$nom = $_SESSION['user']['nom'];
$password = $_SESSION['user']['password'];
$userId = $_SESSION['user']['id'];
var_dump($userId);

// si appuyer sur le boutton
// var_dump($_SESSION);
if (isset($_POST['modification'])){
    $newLogin = htmlspecialchars($_POST['user_login']);
    $newPrenom = htmlspecialchars($_POST['user_prenom']);
    $newNom = htmlspecialchars($_POST['user_nom']);
    $newPassword = htmlspecialchars($_POST['user_password']);
    $newPasswordCheck = htmlspecialchars($_POST['user_password_check']);    
    $newHashpassword = password_hash($newPassword, PASSWORD_DEFAULT);

    // Verifie si login est bien renseigné
    if(empty($newLogin)){
        $missingError = "Veuillez rensenseigner votre login";
        echo $missingError;
    }
    //Cherche dans la BDD si le login existe déja.
    elseif(!empty($newLogin)){
        $queryLogin = "SELECT `login`FROM `utilisateurs` WHERE `login` = '$login'";
        $result = mysqli_query($connect, $queryLogin);
        if(mysqli_num_rows($result) > 0){
            $loginNotAvailable = "Le login n'est pas disponible";
            echo $loginNotAvailable;
        }
    }

    //Si prenom, nom, mdp et mdpCheck ne sont pas renseignés
    if(empty($newPrenom) || empty($newNom) || empty($newPassword) || empty($newPasswordCheck)){
        $missingError = "Veuillez rensenseigner ce champs";
        echo $missingError;
    }
    
    //Verifie que les deux password sont identiques
    if($newPassword != $newPasswordCheck){
        $passwordError = "Veuillez renseigner le même mot de passe";
        echo $passwordError;
    }
    // Si tout les testes sont passées, envoi la requete
    else {
        // Requete SQL : envoi les données dans BDD
        $query = "UPDATE `utilisateurs` SET `login` = '$newLogin', `prenom` = '$newPrenom', `nom` = '$newNom', `password` = '$newHashpassword' WHERE `id` = '$userId' ";
        $requestChangeProfil = mysqli_query($connect, $query);
        header('Location: connexion.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="post" action="">
        <label for="login">Nouveau Login :</label>
        <input type="text" id="login" name="user_login" value="<?php echo $login;?>">
        <label for="prenom">Nouveau Prenom :</label>
        <input type="text" id="prenom" name="user_prenom" value="<?php echo $prenom;?>">
        <label for="nom">Nouveau Nom :</label>
        <input type="text" id="nom" name="user_nom" value="<?php echo $nom;?>">
        <label for="mdp">Nouveau Mot de passe :</label>
        <input type="password" id="mdp" name="user_password">
        <label for="mdp2">Confirmez votre mot de passe :</label>
        <input type="password" id="mdp2" name="user_password_check">
        <button type="submit" name="modification">Modification</button>
    </form>
    <button><a href="index.php">retour</a></button>
</body>
</html>