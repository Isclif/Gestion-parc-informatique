
<?php

 require_once("identifier.php");
     ?>
   
<?php
    
    require_once("connexion.php");

    $select = $db->query("SELECT * FROM utilisateur ORDER BY idU desc");

    if(isset($_GET['ok']) AND !empty($_GET['ok'])){

        $flux = htmlspecialchars($_GET['ok']);

        $select = $db->query('SELECT * FROM utilisateur WHERE Utilisateur_btl Like "%'.$flux.'%"  ORDER BY idU desc');  
    }


    ?>
<!DOCTYPE HTML>
<html>
   <head>
     <meta charset="utf-8">
       <title>  Utilisateurs</title>
       <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
       <link rel="stylesheet" type="text/css" href="monstyle.css">
    
    </head>
   <BODY>
       <?php include("menu.php");?>
       
        <br><br><br>
  <div class ="container">
      <div class="panel panel-warning" margetop60>
       <div class="panel-heading"><strong>Rechercher un Utilisateur</strong></div>
       <div class="panel-body">
           <form method="get" >
            <div class="form-group">
              <label >Entrez le code btl de l'utilisateur: </label>
              <input type="search" name="ok" placeholder="Entrez l'indice de l'element a rechercher" autocomplete="off" class="form-control">
              <br>
            <button type="submit" class="btn btn-success"><strong>Rechercher</strong> </button>
            </div> 
         
           </form>
          
       <SECTion class="affichage INF">





        <br><br>

 
   <a href="Ajout_utilisat.php" class="btn btn-primary"><Strong>Ajouter un Utilisateur</Strong></a> 
   <br><br><br><br> 
     
  

      
 <div class="table-responsive"> 
     <table class="table table-striped table-bordered table-hover" >

         <thead>
         <tr><th>Numero</th>
             <th>Utilisateur_btl</th>
             <th>Nom de l'utilisateur</th>
         <th>Site</th>
         <th>Nom de la direction</th>
         <th>e-mail</th>
        
         <td colspan=2 align="center"><strong>Actions</strong></td>
        </tr>
        </thead>
        <tbody>
        <?php   if($select->rowCount() > 0){  $i=0;

            while($inf = $select->fetch()){

                $i++;  ?>

            <tr>
            <td><?=$i; ?> </td>
                <td><?=$inf['Utilisateur_btl']; ?> </td>
                <td><?=$inf['Nom_utilisateur']; ?> </td>
                <td><?=$inf['Site']; ?> </td>
                <td><?=$inf['Nom_direction']; ?> </td>
                <td><?=$inf['email']; ?> </td>
               
                <td>
                                 
                                 <a onclick="return confirm('voulez-vous modifier ce champ ? ')"
                                  href="edit_ut.php?edit=<?=$inf['idU']; ?>" class="btn btn-primary" >modifier</a>
                                  </td>
  
                                  <td>
  
                                 <a onclick="return confirm('etes vous sur de vouloir supprimer cet utilisateur du parc? ')" 
                                  href="utilisateur.php?delete=<?=$inf['Utilisateur_btl']; ?> " class="btn btn-danger">supprimer</a>
                               
                                
                   
                               
                             </td> 
                
                
            </tr>
            


              
<?php
    }

} else{
  
    ?>
    <p><strong><font color="red">Aucun resultat relative a votre recherche, verifiez l'horthographe et reesayez.</font></strong></p>
    <?php
}

?>
         
        
         <tbody>
         
     </table>
        
    </div>
  </div>
  </div>
       </div>
       
       
  
     

       
           <!-- bouton supprimer l'utilisateur'-->


           <?php

if(isset($_GET['delete']))

{
$Utilisateur_btl = $_GET['delete'];

$sql = "DELETE FROM `gestion_parc`.`utilisateur` WHERE `utilisateur`.`Utilisateur_btl` = '$Utilisateur_btl'";

$query = $db->query($sql);

if($query)

{
    $reponse = "utilisateur supprimer avec success";
echo '<center><div class = "alert alert-success">' .$reponse. '</div></center>';
header('Refresh:1; url=comptes.php');
}


}
?>




<br><br><br>
<br><br><br>
 
<footer class="footer">
      <div class="container">
        <p class="text"><p>Copyright &copy; 2022.    Done by <strong>Ngnetchedjeu Steeve</strong> alias <strong>Microsoft.</strong>
<br/><strong>All rights reserved.</strong></p>
      </div>
    </footer>
       
   </BODY>
</html>

