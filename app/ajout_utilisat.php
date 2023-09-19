<?php require_once("identifier.php"); ?>

<?php require_once('menu.php') ?>







<!--formulaire--->

<!DOCTYPE html>
<html>
<head>
    <title> formulaire d'ajout d'utilisateur</title>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="monstyle.css">
</head>

<body>
<div class ="container">
    <br><br><br><br>
    <center><h1> <strong>AJOUT D'UN UTILISATEUR</strong></h1></center>


    <br>
<form action="ajout_utilisat.php" method="POST">

<table class="table table-striped table-bordered">

<tr>
        <td  align="right">Nom Utilisateur btl</td>
        <td><input type="text" name="Utilisateur_btl" class="form-control" placeholder="entrez le nom btl" required=""></td>
    </tr>
   
    <tr>
        <td  align="right">Nom de l'utilisateur</td>
        <td><input type="text" name="Nom_utilisateur" class="form-control" placeholder="entrez le nom de l'utilisateur" required=""></td>
    </tr>
    <tr>
        <td  align="right">Nom du site</td>
        <td><input type="text" name="Site" class="form-control" placeholder="Entrez le site" required=""></td>
    </tr>
    <tr>
        <td  align="right">Nom de la direction</td>
        <td><input type="text" name="Nom_direction" class="form-control" placeholder="entrez le nom de la direction" required=""></td>
    </tr>
    <tr>
        <td  align="right">E-mail</td>
        <td><input type="text" name="email" class="form-control" placeholder="Entrez l'E-mail" required=""></td>
    </tr>


    
    
</table>
<br>
<center><button type="submit" name="submit" class="btn btn-success">Enregistrer </button></center>


<br><br>



<center><a href="utilisateur.php" class="btn btn-primary">afficher la liste des utilisateur</a></center>

<br><br>










<!--Ajout d'utilisateur--->
       
<?php

require('connexion.php');

if(isset($_POST['submit'])){ //si le bouton valider a ete enclencher

    if(isset( $_POST['Utilisateur_btl'], $_POST['Nom_utilisateur'],  $_POST['Site'], $_POST['Nom_direction'], $_POST['email'])){


        if( $_POST['Utilisateur_btl'] != "" && $_POST['Nom_utilisateur'] != "" && $_POST['Site'] != "" && $_POST['Nom_direction'] != "" && $_POST['email'] != ""){

             //Enregistrement dans la base de donnee

              $Utilisateur_btl = $_POST['Utilisateur_btl'];
              $Nom_utilisateur = $_POST['Nom_utilisateur'];
              $site = $_POST['Site'];
              $Nom_direction = $_POST['Nom_direction'];
              $email = $_POST['email'];
              
    
             $insertion = "INSERT INTO `utilisateur`( `Utilisateur_btl`, `Nom_utilisateur`, `Site`, `Nom_direction`, `email`) VALUES ('$Utilisateur_btl','$Nom_utilisateur', '$site', '$Nom_direction', '$email')";

             $excecute = $db->query($insertion);

             if($excecute == true){
                $msgSuccess = "Nouveau utilisateur ajouter avec succes";
             }else{
                 $msgError = "L'ajout n'a pas pu etre effectuer";

             }
            }


    }
 

}




?>

<div >
<center><p><mark>
<?php
   
   if(isset($msgError)){ echo $msgError; } elseif (isset($msgSuccess)){
       echo $msgSuccess;
       header("refresh:1; url=ajout_utilisat.php");
   }

?>
</mark></p></center>
</div>









</form>
</div>



</body>

<footer class="footer">
      <div class="container">
        <p class="text"><p>Copyright &copy; 2022.    Done by <strong>Ngnetchedjeu Steeve</strong> alias <strong>Microsoft.</strong>
<br/><strong>All rights reserved.</strong></p>
      </div>
    </footer>


</html>