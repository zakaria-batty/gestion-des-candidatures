<?php
session_start();
include('includes/db.php');

//Inscription
if (isset($_POST['Inscription'])) {
    $nom = htmlentities($_POST['nom']);
    $prenom = htmlentities($_POST['prenom']);
    $email = htmlentities($_POST['email']);
    $password = htmlentities($_POST['password']);
    $profile = htmlentities($_POST['profile']);
    $query = "INSERT INTO `user` (`id`, `nom`, `prenom`, `email`, `password`, `profile`) 
            VALUES ('', '$nom', '$prenom', '$email', '$password', '$profile');";
    $run = mysqli_query($db, $query);
    if ($run) {
        header('location:index.php?message=Inscription');
    } else {
        header('location:inscription.php?message=err');
    }
}


// login
if (isset($_POST['login'])) :
    $email = htmlentities($_POST['email']);
    $password = htmlentities($_POST['password']);
    $profile = htmlentities($_POST['profile']);

    $query = "SELECT * FROM user WHERE email='$email' AND password='$password' AND profile='$profile'";
    $run = mysqli_query($db, $query);
    $data = mysqli_fetch_array($run);

    if ($data) {
        $_SESSION['nom'] = $data['nom'];
        $_SESSION['prenom'] = $data['prenom'];
        $_SESSION['email'] = $data['email'];

        if ($profile == "Condida") {
            header('location:Condida/index.php');
        }else{
            header('location:Rh/index.php');
        }

    } else {
        header('location:index.php?msg=err');
    }

endif;

