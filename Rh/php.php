<?php
include('../includes/db.php');

function redirect($page){
    header('location:' .$page);
}

if (isset($_POST['submit'])) {

    $Typeposte = htmlentities($_POST['Typeposte']);
    $Intituleposte = htmlentities($_POST['Intituleposte']);
    $ville = htmlentities($_POST['ville']);
    $time = date('H:i:s');
    $query = " INSERT INTO `offre` (`id`, `Nom`, `prenom`, `Typeposte`, `Intituleposte`, `ville`, `statut`, `description`, `time`, `cv`, `offre`)
           VALUES ('', '', '', '$Typeposte', '$Intituleposte', '$ville', 'rien', '', '$time', '', '0');";
    $run = mysqli_query($db, $query);
    if ($run) {
        redirect('index.php?message=poste');
    } else {
        redirect('index.php?message=err');
    }
}

if (isset($_POST['accepter'])) {
    $id = $_POST['accepter'];
    $query = "UPDATE `offre` SET `statut` = 'accepter' WHERE `offre`.`id` = '$id'";
    $run = mysqli_query($db, $query);
    if ($run) {
        redirect('index.php?message=accepter');
    } else {
        redirect('index.php?message=err');
    }
}


if (isset($_POST['refuser'])) {
    $id = $_POST['refuser'];
    $query = "UPDATE `offre` SET `statut` = 'refuser' WHERE `offre`.`id` = '$id'";
    $run = mysqli_query($db, $query);
    if ($run) {
        redirect('index.php?message=refuser');
    } else {
        redirect('index.php?message=err');
    }
}

if (isset($_POST['supprimer'])) {
    $id = $_POST['supprimer'];
    $query = "DELETE FROM `offre` WHERE `offre`.`id` = '$id'";
    $run = mysqli_query($db, $query);
    if ($run) {
        redirect('index.php?message=supprimer');
    } else {
        redirect('index.php?message=err');
    }
}

if (isset($_POST['envoyer'])) {
    $id = $_POST['id'];
    $description = $_POST['description'];
    $query = "UPDATE `offre` SET `description` = '$description' WHERE `offre`.`id` = $id;";
    $run = mysqli_query($db, $query);
    if ($run) {
        redirect('index.php?message=envoyer');
    } else {
        redirect('index.php?message=err');
    }
}
