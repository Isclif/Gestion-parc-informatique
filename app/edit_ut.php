<?php require_once("identifier.php"); ?>


<?php

require_once("connexion.php");








$requette = $db->prepare('SELECT * FROM `utilisateur` WHERE idU = :id');

$requette->bindValue(':id',$_GET['edit'], PDO::PARAM_INT);

//execution de la requette


$executeIsOk = $requette->execute();


//execution de la requette

$row1 = $requette->fetch();





?>



<!DOCTYPE HTML>
<html>
   <head>
     <meta charset="utf-8">
       <title> Modification du materiel</title>
       <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="monstyle.css">
    
    </head>
   <BODY>
       <?php include("menu.php");?>
       
        <br><br><br>
  <div class ="container">
  <br><br><br><br>
    <center><h1> <strong>MODIFICATION DES ELEMENTS</strong></h1></center>
    <br>



       <form action="modifier_ut.php" method="POST">

<table class="table table-striped table-bordered">

<input type="hidden" name="edit" class="form-control"  value="<?= $row1['idU']; ?>">
   
    
<tr>
        <td  align="right">Nom Utilisateur btl</td>
        <td><input type="text" name="Utilisateur_btl" class="form-control" value="<?= $row1['Utilisateur_btl']; ?>" ></td>
    </tr>
   
    <tr>
        <td  align="right">Nom de l'utilisateur </td>
        <td><input type="text" name="Nom_utilisateur" class="form-control" value="<?= $row1['Nom_utilisateur']; ?>" ></td>
    </tr>

    <tr>
        <td  align="right">Nom du site</td>
        <td><input type="text" name="Site" class="form-control" value="<?= $row1['Site']; ?>"></td>
    </tr>

   
   
    <tr>
        <td  align="right">Nom de la direction</td>
        <td><input type="text" name="Nom_direction" class="form-control" value="<?= $row1['Nom_direction']; ?>"></td>
    </tr>
        
<tr>
        <td  align="right">E-mail</td>
        <td><input type="text" name="email" class="form-control" value="<?= $row1['email']; ?>" ></td>
    </tr>
   
    
    
    
</table>
<br>
<center><button type="submit" name="submit" class="btn btn-primary" >enregistrer les modification </button></center>
<br><br>

</form>

</div>
</div>



</div>
   
<footer class="footer">
      <div class="container">
        <p class="text"><p>Copyright &copy; 2022.    Done by <strong>Ngnetchedjeu Steeve</strong> alias <strong>Microsoft.</strong>
<br/><strong>All rights reserved.</strong></p>
      </div>
    </footer>

</body>
</html>