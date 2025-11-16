<?php
$con = mysqli_connect("127.0.0.1", "root", "", "gestion_stock");
if (!$con) die("Erreur connexion BDD");

$req = "SELECT * FROM produits";
$prd = mysqli_query($con, $req);
?>