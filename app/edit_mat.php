<?php require_once("identifier.php"); ?>



<?php

require_once("connexion.php");








$requette = $db->prepare('SELECT * FROM `materiel` WHERE Numero = :numero');

$requette->bindValue(':numero',$_GET['edit'], PDO::PARAM_INT);

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



       <form action="modifier_equip.php" method="POST">

<table class="table table-striped table-bordered">

<input type="hidden" name="edit" class="form-control"  value="<?= $row1['numero']; ?>">
   
    <tr>
        <td  align="right">Nature</td>

        <td><input type="text" name="Nature" class="form-control"  value="<?= $row1['nature']; ?>"></td>
    </tr>
    <tr>
        <td  align="right">Date d'entrer du materiel</td>
        <td><input type="date" name="Date_entree" class="form-control" value="<?=$row1['date_entree']; ?>"></td>
    </tr>

    <tr>
        <td  align="right">Date de sortie du materiel</td>
        <td><input type="date" name="Date_sortie" class="form-control" value="<?=$row1['Date_sortie']; ?>"></td>
    </tr>

    <tr>
        <td  align="right">Ancien numero de configuration</td>
        <td><input type="text" name="Num_config_ancien" class="form-control"  value="<?= $row1['Num_config_ancien']; ?>"></td>
    </tr>
    <tr>
        <td  align="right">Nouveau numero de configuration</td>
        <td><input type="text" name="Num_config_nouveau" class="form-control" value="<?= $row1['Num_config_nouveau']; ?>" ></td>
    </tr>
    <tr>
        <td  align="right">INF</td>
        <td><input type="text" name="INF" class="form-control"  value="<?= $row1['INF']; ?>"></td>
    </tr>
    
    <tr>
        <td  align="right">Numero de serie</td>
        <td><input type="text" name="Numero_serie" class="form-control"  value="<?=$row1['Numero_serie']; ?>" ></td>
    </tr>
    <tr>
        <td  align="right">Etat</td>
        <td><input type="text" name="Etat" class="form-control"  value="<?=$row1['Etat']; ?>" ></td>
    </tr>
    <tr>
        <td  align="right">Mode de migration</td>
        <td><input type="text" name="Mode_migration" class="form-control"  value="<?=$row1['Mode_migration']; ?>"></td>
    </tr>
    <tr>
        <td  align="right">Date de migration</td>
        <td><input type="date" name="Date_migration" class="form-control"  value="<?=$row1['Date_migration']; ?>" ></td>
    </tr>

    <tr>
        <td  align="right">Cout du materiel</td>
        <td><input type="text" name="Cout_materiel" class="form-control"  value="<?=$row1['Cout_materiel']; ?>" ></td>
    </tr>
    
    
</table>
<br>
<center><button type="submit" name="submit" class="btn btn-primary" >enregistrer les modification </button></center>
<br><br>

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