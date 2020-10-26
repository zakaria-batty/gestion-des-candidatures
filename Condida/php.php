<?php
include('../includes/db.php');
if (isset($_POST['poste'])) {
    $id = $_POST['id'];
    $nom = htmlentities($_POST['Nom']);
    $prenom = htmlentities($_POST['prenom']);
    // $cv = htmlentities($_POST['cv']);
    $query = "UPDATE offre SET Nom='$nom', prenom='$prenom',  offre = 1 WHERE id='$id'";
    $run = mysqli_query($db, $query);
    if ($run) {
        echo 'ok';
    } else {
        echo 'errour';
    }
}