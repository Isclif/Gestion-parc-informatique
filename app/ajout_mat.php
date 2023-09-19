
<?php require_once("identifier.php"); ?>
<?php require_once('menu.php') ?>


    

<!--Ajout du materiel--->


<br><br><br><br>


<center><a href="materiel.php" class="btn btn-primary">afficher la liste des materiels</a></center>

<br><br>

<?php

require('connexion.php');

if(isset($_POST['submit'])){ //si le bouton valider a ete enclencher

    if(isset( $_POST['Nature'], $_POST['Date_entree'], $_POST['Date_sortie'],  $_POST['Num_config_ancien'], $_POST['Num_config_nouveau'], $_POST['INF'], $_POST['Numero_serie'], $_POST['Etat'], $_POST['Mode_migration'], $_POST['Date_migration'], $_POST['Cout_materiel'])){


        if(  $_POST['Nature'] != "" && $_POST['Date_entree'] != "" && $_POST['Date_sortie'] != "" && $_POST['Num_config_ancien'] != "" && $_POST['Num_config_nouveau'] != "" && $_POST['INF'] != "" && $_POST['Numero_serie'] != "" && $_POST['Etat'] != "" && $_POST['Mode_migration'] != "" && $_POST['Date_migration'] != "" && $_POST['Cout_materiel'] != ""){

             //Enregistrement dans la base de donnee

              
              $Nature = $_POST['Nature'];
              $Date_entree = $_POST['Date_entree'];
              $Date_sortie = $_POST['Date_sortie'];
              $Num_config_ancien = $_POST['Num_config_ancien'];
              $Num_config_nouveau = $_POST['Num_config_nouveau'];
              $INF = $_POST['INF'];
             
              $Num_serie = $_POST['Numero_serie'];
              $Etat = $_POST['Etat'];
              $Mode_Migration = $_POST['Mode_migration'];
              $Date_Migration = $_POST['Date_migration'];
              $Cout_materiel = $_POST['Cout_materiel'];


             $insertion = "INSERT INTO `materiel`( `nature`, `date_entree`, `Date_sortie`, `Num_config_ancien`, `Num_config_nouveau`, `INF`, `Numero_serie`, `Etat`, `Mode_migration`, `Date_migration`, `Cout_materiel`)  VALUES ( '$Nature', '$Date_entree','$Date_sortie', '$Num_config_ancien', '$Num_config_nouveau', ' $INF', '$Num_serie', '$Etat' ,'$Mode_Migration', '$Date_Migration', '$Cout_materiel')";

             $excecute = $db->query($insertion);

             if($excecute == true){
                $msgSuccess = "Nouveau materiel enregistrer avec succes";
             }else{
                 $msgError = "L'ajout n'a pas pu etre effectuer";

             }
        }



    }
 

}




?>

<div class="color">
<?php
   
   if(isset($msgError)){ echo $msgError; } elseif (isset($msgSuccess)){
       echo $msgSuccess;

      

     
   }

?>
</div>

<br>




<!--formulaire--->

<!DOCTYPE html>
<html>
<head>
    <title> formulaire d'ajout</title>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="monstyle.css">
</head>

<body>
<div class ="container">
    <br><br><br><br>
    <center><h1> <strong>AJOUT DU MATERIEL DANS LE PARC</strong></h1></center>
    <br>
<form action="ajout_mat.php" method="POST">

<table class="table table-striped table-bordered">

   
    <tr>
        <td  align="right"><label>Nature:</label></td>
        
              <td><select name="Nature" class="form-control" required="" >
                   <option >---Choisir---</option>
                   <option >cle usb</option>
                   <option >desktop</option>
                <option >laptop</option>
                <option >projecteur</option>
                    <option >imprimante</option>
                    <option >ecran</option>
                    <option >souris</option>
                
                </td> 
</select>
    </tr>
    <tr>
        <td  align="right">Date d'entrer du materiel</td>
        <td><input type="date" name="Date_entree" class="form-control" required=""></td>
    </tr>

    <tr>
        <td  align="right">Date de fin de vie du materiel</td>
        <td><input type="date" name="Date_sortie" class="form-control" required=""></td>
    </tr>

    <tr>
        <td  align="right">Ancien numero de configuration</td>
        <td><input type="text" name="Num_config_ancien" class="form-control" placeholder="entrez l'ancien numero de configuration" required=""></td>
    </tr>
    <tr>
        <td  align="right">Nouveau numero de configuration</td>
        <td><input type="text" name="Num_config_nouveau" class="form-control" placeholder="entrez le nouveau numero de configuration" required="" ></td>
    </tr>
    <tr>
        <td  align="right">INF</td>
        <td><input type="text" name="INF" class="form-control" placeholder="Entrez l'INF" required=""></td>
    </tr>
    
    <tr>
        <td  align="right">Numero de serie</td>
        <td><input type="text" name="Numero_serie" class="form-control" placeholder="Entrez le numero de serie" required="" ></td>
    </tr>


    <tr>
        <td  align="right"><label>Etat de machine:</label></td>
        
              <td><select name="etat" class="form-control" required="" >
                   <option >---Choisir---</option>
                   <option >migre</option>
                   <option >non migre</option>
                <option >en panne</option>
                <option >nouvelle machine</option>
                    <option >Ancienne machine reparer</option>
                    <option >unite centrale deffectueux</option>
                    <option >Systeme d'exploitation obselete</option>
                
                </td> 
</select>
    </tr>
    
    <tr>
        <td  align="right">Mode de migration</td>
        <td><input type="text" name="Mode_migration" class="form-control" placeholder="Entrez le mode " required=""></td>
    </tr>
    <tr>
        <td  align="right">Date de migration</td>
        <td><input type="date" name="Date_migration" class="form-control" placeholder="Entrez la date de migration" required="" ></td>
    </tr>
    <tr>
        <td  align="right">Prix du materiel</td>
        <td><input type="text" name="Cout_materiel" class="form-control" placeholder="Entrez le cout du materiel" required="" ></td>
    </tr>
    
    
</table>
<br>
<center><button type="submit" name="submit" class="btn btn-success" >Ajouter </button></center>
<br><br>







<br><br>












</form>
</div>

<footer class="footer">
      <div class="container">
        <p class="text"><p>Copyright &copy; 2022.    Done by <strong>Ngnetchedjeu Steeve</strong> alias <strong>Microsoft.</strong>
<br/><strong>All rights reserved.</strong></p>
      </div>
    </footer>


</body>

</html>

