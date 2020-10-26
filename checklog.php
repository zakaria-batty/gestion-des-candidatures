<?php
session_start();
include('includes/db.php');
if (isset($_POST['submit'])) :
    $email = htmlentities($_POST['email']);
    $password = htmlentities($_POST['password']);

    $query = "SELECT * FROM user WHERE email='$email' AND password='$password' AND profile='Condida'";
    $run = mysqli_query($db, $query);
    $data = mysqli_fetch_array($run);

    if ($data) {
        $_SESSION['nom'] = $data['nom'];
        $_SESSION['prenom'] = $data['prenom'];
        $_SESSION['email'] = $data['email'];
        header('location:Condida/index.php');
    } else {
        header('location:index.php?msg=err');
    }

endif;

