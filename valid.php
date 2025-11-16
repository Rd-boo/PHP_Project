<?php
    $emai = $_POST["mail"];
    $pasc = $_POST["pasc"];

    // connexion au server et la bdd
    $con = mysqli_connect("127.0.0.1", "root", "", "gestion_stock");
    if (!$con) die("Echec de la connexion!");

    // Vérifier les infos de user
    $req = "SELECT Email, Pass_word FROM Users";
    $valid = false;
    $users = mysqli_query($con, $req);

    while ($line = mysqli_fetch_array($users)){
        if ($emai == $line["Email"] && $pasc == $line["Pass_word"]) {
            $valid = true;
        }
    }

    if ($valid) {
        header("Location: produit.php");
        exit();
    } 
    else {
        header("Location: connect_user.php?error=invalid_credentials");
        exit();
    }
?>