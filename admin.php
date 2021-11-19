<?php
session_start();
// Connexion à la BDD
$connect = mysqli_connect('localhost', 'root','','moduleconnexion');
mysqli_set_charset($connect, 'utf8');
//Vérifie la connexion à la BDD
if($connect === false){
    die("ERREUR : Impossible de se connecter à la Base de données. " . mysqli_connect_error());
}
$requete = mysqli_query($connect,"SELECT * FROM `utilisateurs`");
$data = mysqli_fetch_all($requete, MYSQLI_ASSOC);



?>
<table>
<thead>
    <tr>
        <th>id</th>
        <th>login</th>
        <th>prenom</th>
        <th>nom</th>
        <th>password</th>
    </tr>
    <form action="" >
        <?php
            foreach($data as $datas):?>
            <tr>
                <td><?= $datas['id'];?></td>
                <td><?= $datas['login'];?></td>
                <td><?= $datas['prenom'];?></td>
                <td><?= $datas['nom'];?></td>
                <td><?= $datas['password'];?></td>
                <td><form action="" method="post"><input type="submit" name="delete" value="delete"></form></td>
            </tr>
        <?php endforeach;?>

        // Test fonction delete     
        <!-- <?php
            if(isset($_POST['delete'])){
                $id=$datas['id'];
                $query = "DELETE FROM `utilisateurs` WHERE id='$id'"; 
                $result = mysqli_query($connect,$query) or die ( mysqli_error());
            }
        ?> -->
    </tbody>
    
</thead>
</table>
