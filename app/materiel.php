<?php
   require_once("identifier.php");

require_once("connexion.php");
 
/*
if(isset($_GET['Nom_direction']))

$Nom_direction=$_GET['Nom_direction'];
else
    $Nom_direction="";
    */
  $INF=isset($_GET['INF'])?$_GET['INF']:"";
$nature=isset($_GET['nature'])?$_GET['nature']:"all";

if($nature=="all"){
 $requete= "SELECT * from materiel
     where INF like '%$INF%'";
}else{
    $requete= "SELECT * from materiel
     
     where INF like '%$INF%'
     and nature= '$nature' ";
}

 $resultatm= $db->query($requete);



?>
<!DOCTYPE HTML>
<html>
   <head>
     <meta charset="utf-8">
       <title> les equipements</title>
       <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="monstyle.css">
    
    </head>
   <BODY>
       <?php include("menu.php");?>
       
        <br><br><br>
  <div class ="container">
      <div class="panel panel-warning" margetop60>
       <div class="panel-heading"><strong>Rechercher de materiel...</strong></div>
       <div class="panel-body">
           <form method="get" action="materiel.php" >
            <div class="form-group">
            <strong>INF machine</strong> <input type="text" name="INF"placeholder="taper l'INF du materiel" class="form-control" value="<?php echo $INF ?>">
            </div> 
               
                 <label><strong>Nature:</strong></label>
               <select name="nature" class="form-control" id="Site" onchange="this.form.submit()"  >
                   <option value="all"<?php if($nature==="all") echo "selected "?>>toutes natures</option>
                   <option value="cle" <?php if($nature==="cle") echo "selected "?>>cle usb</option>
                   <option value="desktop"<?php if($nature==="desktop") echo "selected "?>>desktop</option>
                <option value="laptop"<?php if($nature==="laptop") echo "selected "?>>laptop</option>
                <option value="projecteur"<?php if($nature==="projecteur") echo "selected "?>>projecteur</option>
                    <option value="imprimante"<?php if($nature==="imprimante") echo "selected "?>>imprimante</option>
                    <option value="ecran"<?php if($nature==="ecran") echo "selected "?>>ecran</option>
               </select>
             <br><br><br>
              <button type="submit" class="btn btn-success">
                  <strong>Rechercher...</strong></button> 
 
                 &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                
                 <?php if($_SESSION['user']['role']=='Admin') { ?>
             <a href="ajout_mat.php" class="btn btn-primary"><strong>Ajouter un materiel</strong>  </a>
           &nbsp &nbsp
                        <?php } ?>
           <br>
           </form>
           </div>
       </div>
       
       <div class="panel panel-primary">
       <div class="panel-heading"><center><strong>inventaire du materiel...</strong></center></div>
       <div class="panel-body">
         <div class="table-responsive"> 
           <table class="table table-striped table-bordered table-hover" >
             <thead>
              <tr>
                  <th>Numero </th><th> Nature </th><th> date_entree</th><th> date_fin_de_vie</th><th> ancien_num_config</th><th>nouveau_num_config</th><th>INF</th><th>Numero de serie</th><th>Etat</th><th>Mode de migration</th><th>Date de migration</th><th>prix_materiel</th>
                  
                  <?php if($_SESSION['user']['role']=='Admin') { ?>
                  <td colspan=2 align=center> <strong>Actions</strong></td>
                <?php } ?>
               </tr> 
               
               </thead>
               <tbody>
                  
                  <?php   if($resultatm->rowCount() > 0){
                  
                  $i=0; while( $materiel= $resultatm->fetch()){
                    
                    $i++;?>
                    
                           <tr>
                     <td><?php echo $i; ?></td>
                       <td><?php echo $materiel['nature'] ?></td>
                        <td><?php echo $materiel['date_entree'] ?></td> 
                        <td><?php echo $materiel['Date_sortie'] ?></td>       
                         <td><?php echo $materiel['Num_config_ancien'] ?></td>      
                           <td><?php echo $materiel['Num_config_nouveau'] ?></td> 
                             <td><?php echo $materiel['INF'] ?></td>  
                              
                               <td><?php echo $materiel['Numero_serie'] ?></td>
                               <td><?php echo $materiel['Etat'] ?></td>
                               <td><?php echo $materiel['Mode_migration'] ?></td>
                               <td><?php echo $materiel['Date_migration'] ?></td>
                               <td><?php echo $materiel['Cout_materiel'] ?></td>
                               
                               <?php if($_SESSION['user']['role']=='Admin') { ?>


                                 <td>
                                 
                                 
                               <a onclick="return confirm('voulez-vous modifier ce materiel ? ')"
                                href="edit_mat.php?edit=<?php echo $materiel['numero']?>" class="btn btn-primary" >modifier</a>

                                
                                </td> 

                               
                                <td> 
                                <a onclick="return confirm('etes vous sur de vouloir supprimer ce materiel ? ')" 
                                  href="materiel.php?delete=<?php echo $materiel['numero']?> " class="btn btn-danger">supprimer</a>
                             
                              
                 
                             
                           </td> 
                                  <?php } ?>
                              
                            </tr>  



                       <?php }  
                      } else{
  
                        ?>
                        <p><strong><font color="red">Aucun resultat relative a votre recherche, verifiez l'horthographe et reesayez.</font></strong></p>
                        <?php
                    }
                    
                    ?>
               
               </tbody>
           
           </table></div>
          
          </div>
           </div>


 <!-- bouton supprimer materiel-->


 <?php

if(isset($_GET['delete']))

{
$Numero = $_GET['delete'];

$sql = "DELETE FROM `gestion_parc`.`materiel` WHERE `materiel`.`Numero` = $Numero";

$query = $db->query($sql);

if($query)

{
echo "utilisateur supprimer avec success";
}
header("refresh:1; url=materiel.php");

}
?>



   
     


<footer class="footer">
      <div class="container">
        <p class="text"><p>Copyright &copy; 2022.    Done by <strong>Ngnetchedjeu Steeve</strong> alias <strong>Microsoft.</strong>
<br/><strong>All rights reserved.</strong></p>
      </div>
    </footer>
   
   </BODY>

</html>