<?php
include('../includes/db.php');
if (isset($_POST['poste'])) {

    $dir = "../image/";
    $target = $dir . basename($_FILES['cv']['name']);



    if (move_uploaded_file($_FILES["cv"]["tmp_name"], $target)) {
        // echo "image telechargé";
    } else {
        // echo "erur";
    }


    $pdf = $_FILES['cv']['name'];

    $id = $_POST['id'];
    $nom = htmlentities($_POST['Nom']);
    $prenom = htmlentities($_POST['prenom']);
    $cv = $pdf;
    $query = "UPDATE offre SET Nom='$nom', prenom='$prenom', cv='$cv',  offre = 1 WHERE id='$id'";
    $run = mysqli_query($db, $query);
    if ($run) {
        header('location:index.php?message=poste');
    } else {
        header('location:index.php?message=err');
    }
}
