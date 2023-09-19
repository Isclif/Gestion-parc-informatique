
<?php require_once("identifier.php"); ?>

<?php

require_once 'connexion.php';


$requette = $db->prepare("SELECT `INF`FROM `materiel`");
$requette->execute();
$row1 = $requette->fetchAll();

$req = $db->prepare("SELECT `Utilisateur_btl` FROM `utilisateur` ");
$req->execute();
$rows = $req->fetchAll();


$req = $db->prepare("SELECT `Site` FROM `utilisateur` ");
$req->execute();
$rows4 = $req->fetchAll();

$req = $db->prepare("SELECT `Nom_direction` FROM `utilisateur` ");
$req->execute();
$rows5 = $req->fetchAll();


$req = $db->prepare("SELECT `email` FROM `utilisateur` ");
$req->execute();
$rows6 = $req->fetchAll();


$req = $db->prepare("SELECT * FROM mat_utilisateur order by `idM` DESC");
$req->execute();
$rows2 = $req->fetchAll();
?>

