<?php require_once("identifier.php"); ?>
<?php include("menu.php");?>
<?php

require('connexion.php');

?>











<?php  require('Recuperation.php'); ?>

<!DOCTYPE html>
<html>
   <head>
     <meta charset="utf-8">
       <title> Flux de materiel-ajout</title>
       <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="monstyle.css">

        </head>


    
   <BODY>


   <div class ="container">
   


<br><br><br>


<div class="panel panel-warning" margetop60>
       <div class="panel-heading"><strong>Fluxmateriel</strong></div>
       <div class="panel-body">

<form action="" method="POST" >

<!--Enregistrement dans la base--->
<?php

if(isset($_POST['submit'])){ //si le bouton valider a ete enclencher

    if(isset($_POST['INF'], $_POST['Utilisateur_btl'],  $_POST['Nom_direction'], $_POST['Site'], $_POST['email'], $_POST['Date'], $_POST['motif'])){


        if( $_POST['INF'] != "" && $_POST['Utilisateur_btl'] != "" && $_POST['Nom_direction'] != "" && $_POST['Site'] != ""  && $_POST['email'] != ""  && $_POST['Date'] != "" && $_POST['motif'] != ""){

             //Enregistrement dans la base de donnee
              
             $INF = $_POST['INF'];
              $Utilisateur_btl= $_POST['Utilisateur_btl'];
              
              $Nom_direction= $_POST['Nom_direction'];
              
              $Site= $_POST['Site'];
              $email = $_POST['email'];
              
              $Date = $_POST['Date'];
              $Motif = $_POST['motif'];
              
             
             $insertion = "INSERT INTO `mat_utilisateur`( `INF`, `Utilisateur_btl`, `Nom_direction`, `Site`, `email`, `Date`, `motif`) VALUES  ( '$INF','$Utilisateur_btl', '$Nom_direction','$Site', '$email', '$Date', '$Motif')";

             $excecute = $db->query($insertion);

             if($excecute == true){
                $msgSuccess = "Mise a jour reussie";
               
             }else{
                 $msgError = "Echec mise a jour";

             }
            
        }



    }
 

}


?>

<div class="color">
   
   <?php if(isset($msgError)){?>

    <div class="alert alert-danger">
            <?php echo $msgError ?> 
    </div>
    
        <?php }?> 
        
        <?php if (isset($msgSuccess)){?>
    
        <div class="alert alert-success">   
            <?php echo $msgSuccess ?>
        </div>
           
       <?php }?> 

</div>

<br>


<div class="form-group">


        <label><strong>Choisissez l'INF machine:</strong></label>

        <select name="INF" class="form-control" >
        <option value="">...Choisir...</option>
       
           
        <?php foreach($row1 as $row): ?>
            
            <option ><?=$row['INF']; ?> </option>
        

        <?php endforeach ?>

        </select>
        <br>

        <strong>Choisissez l'Utilisateur_btl:</strong></label>

        <select name="Utilisateur_btl" class="form-control" >
        <option value="">...Choisir...</option>
        <?php foreach($rows as $row): ?>

            <option > <?=$row['Utilisateur_btl']; ?>
            </option>
        <?php endforeach ?>
        
        </select>
        <br>

        

<strong>Choisissez le site:</strong></label>

        <select name="Site" class="form-control" >
        <option value="">...Choisir...</option>
        <?php foreach($rows4 as $row): ?>

            <option > <?=$row['Site']; ?>
            </option>
        <?php endforeach ?>
        
        </select>
        <br>

        <strong>Choisissez le nom de la direction:</strong></label>

        <select name="Nom_direction" class="form-control" >
        <option value="">...Choisir...</option>
        <?php foreach($rows5 as $row): ?>

            <option > <?=$row['Nom_direction']; ?>
            </option>
        <?php endforeach ?>
        
        </select>
        <br>

        <strong>Choisissez l'E-mail de l'utilisateur:</strong></label>

        <select name="email" class="form-control" >
        <option value="">...Choisir...</option>
        <?php foreach($rows6 as $row): ?>

            <option > <?=$row['email']; ?>
            </option>
        <?php endforeach ?>
        
        </select>
        <br>


        <label><strong>Entrez la date de l'evenement:</strong></label>


        
        <input type="date" name="Date" class="form-control" required="">

        <br>

        <input type="text" name="motif" placeholder="Entrez le motif brievement" class="form-control" required="">

        <br>
        
        <button class="btn btn-success" type="submit" name="submit"><strong>Enregistrer </strong></button>
       <br><br><br>

        
<a href="rech_suivi_mat.php" class="btn btn-primary"><strong>Rechercher</strong> </a>
        
        <br/>

        </div>


</form></br>
</div>


</div>


<!--Affichage--->

<div class="panel panel-primary">
       <div class="panel-heading"> <center><Strong>Tableau Associatif</Strong></center></div>
       <div class="panel-body">

       <div class="table-responsive"> 
           <table class="table table-striped table-bordered table-hover">
         <thead>
         <tr>
             <th>Flux Numero</th>
         <th>INF</th>
         <th>Utilisateur_btl</th>
         <th>Nom_direction</th>
         <th>Site</th>
         <th>E-mail-Utilisateur</th>
         <th>Date du flux</th>
         <th>Motif</th>
         
        </tr>
        </thead>
        <tbody>
        <?php foreach($rows2 as $row): ?>

            <tr>
                <td><?=$row['idM']; ?> </td>
                <td><?=$row['INF']; ?> </td>
                <td><?=$row['Utilisateur_btl']; ?> </td>
                <td><?=$row['Nom_direction']; ?> </td>
                <td><?=$row['Site']; ?> </td>
                <td><?=$row['email']; ?> </td>
                <td><?=$row['Date']; ?> </td>
                <td><?=$row['motif']; ?> </td>
                
                
            </tr>
            


        <?php endforeach ?>
        
         <tbody>

     </table>

        </div>
    
        </div>
    </div>
    
    </div>
  
       
    <footer class="footer">
      <div class="container">
        <p class="text"><p>Copyright &copy; 2022.    Done by <strong>Ngnetchedjeu Steeve</strong> alias <strong>Microsoft.</strong>
<br/><strong>All rights reserved.</strong></p>
      </div>
    </footer>
 

   </BODY>
</html>