<?php
include('../includes/db.php');
if (isset($_POST['poste'])) {

    // $dir = "../image/";
    // $target = $dir . basename($_FILES['cv']['name']);

    $id = $_POST['id'];
    $nom = htmlentities($_POST['Nom']);
    $prenom = htmlentities($_POST['prenom']);
    $cv = htmlentities($_POST['cv']);
    $query = "UPDATE offre SET Nom='$nom', prenom='$prenom', cv='$cv',  offre = 1 WHERE id='$id'";
    $run = mysqli_query($db, $query);
    if ($run) {
        header('location:index.php?message=poste');
    } else {
        header('location:index.php?message=err');
    }
}
