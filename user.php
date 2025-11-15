<?php

$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$age = $_POST["age"];

$email = $_POST["email"];   // email au niveau de creation
$past = $_POST["past"];    // password au niveau de creation

$mail = $_POST["mail"]; // email au niveau de connexion
$pasc = $_POST["pasc"];    // password au niveau de connexion

try{
    // connexion au server et la bdd
    $con = mysqli_connect("localhost", "root", "", "gestion_stock");
    if (!$con) die("Echec de la connexion!");

    // Sauvegarder les infos de user
    $req = "SELECT Email FROM users";
    $exist = false;
    $emls = mysqli_query($con, $req);

    while ($line = mysqli_fetch_array($emls)){
        if ($email == $line["Email"]) {
            $exist = true;
            die("This email already exist!");
        }
        else if (isset($mail) && $mail != $line["Email"]) {
            die("Cet email n'associe a aucune compte!");
        }
        else if (isset($pasc) && $pasc != $line["Pass_word"]) {
            die("Mot de passe incorrect!");
        }
    }

    // Ajouter user
    if (!$exist) {
        $req = "INSERT INTO users (Nom, Prenom, Age, Email, Pass_word) VALUES ('$nom', '$prenom', $age, '$email', '$past')";
        $ajouter = mysqli_query($con, $req);
        if (!$ajouter) die("Requete invalide: $req");
    }
} catch(Exception $e){
    // Vide pour ignore les erreurs
}


/*
// Aller au page de categorie
include 'cateorie.php';
header('Location: categorie.php');
exit;
*/
?>