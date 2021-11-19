<?php
session_start();

// Redirige vers la page de profile si une session est déja active
if(isset($_SESSION['user'])) {
    header('Location: profil.php');
}

if(isset($_POST['connexion'])){
    // on vérifie que le champ "Pseudo" n'est pas vide
    if (empty($_POST['username'])){
        $usernameError = "Veuillez renseigner l'username.";
        echo $usernameError;
    }
    else{
        // les champs sont bien posté et pas vide, on sécurise les données entrées par le membre:
        $login = htmlentities($_POST['username']);
        $password = htmlentities($_POST['password']);
        //on se connecte à la base de données:
        $connect = mysqli_connect('localhost', 'root','','moduleconnexion');
        mysqli_set_charset($connect, 'utf8');
        //Vérifie que la connexion s'effectue correctement:
        if(!$connect){
                echo "Erreur de connexion à la base de données.";
        }
        else {
            // on fait maintenant la requête dans la base de données pour rechercher si ces données existe et correspondent:
            $requete = mysqli_query($connect,"SELECT * FROM `utilisateurs` WHERE `login` = '".$login."'");
            $result = mysqli_fetch_assoc($requete);
            $check_password = $result['password'];
            // var_dump($result['password']);
            if(mysqli_num_rows($requete) == 0) 
                {
                    echo "Le pseudo ou le mot de passe est incorrect, le compte n'a pas été trouvé.";
                }
            //Connexioin mot de passe hash
            elseif(password_verify($password, $check_password)) {
                // on ouvre la session avec $_SESSION:
                if($result['login']==='admin'){
                    $_SESSION['admin'] = $result;
                    header('Location: index.php');
                    echo "je suis l'admin";
                }
                else{
                    $_SESSION['user'] = $result;
                    echo "Vous êtes à présent connecté !";
                    header('Location: profil.php');
                }
            }
        }
    }
}
if(isset($_POST['deconnexion'])){
    session_destroy();
    echo "Vous êtes à présent déconnecté !";
    header('Location: index.php');
}
var_dump($_SESSION);
?>

<form action="" method="post">
    <h1>Connexion</h1>
    <label for="username">Username :</label>
    <input type="text" id="username" name="username">
    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password">
    <input type="submit" name="connexion" value="connexion">
    <?php if(isset($_SESSION)){
        echo '<input type="submit" name="deconnexion" value="deconnexion">';
    }
    ?>
</form>
<button><a href="index.php">retour</a></button>
<button><a href="inscription.php">Inscrivez-vous</a></button>
