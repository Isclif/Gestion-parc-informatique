
<?php require_once("identifier.php"); ?>


<?php
    
    require_once("connexion.php");

    $select = $db->query("SELECT * FROM mat_utilisateur ORDER BY idM desc");

    if(isset($_GET['ok']) AND !empty($_GET['ok'])){

        $flux = htmlspecialchars($_GET['ok']);

        $select = $db->query('SELECT * FROM mat_utilisateur WHERE INF Like "%'.$flux.'%"  ORDER BY idM desc');  
    }


    ?>
<!DOCTYPE HTML>
<html>
   <head>
     <meta charset="utf-8">
       <title>  Flux materiel-recherche</title>
       <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
       <link rel="stylesheet" type="text/css" href="monstyle.css">
    
    </head>
   <BODY>
       <?php include("menu.php");?>
       
        <br><br><br>
  <div class ="container">
      <div class="panel panel-warning" margetop60>
       <div class="panel-heading"><strong>Rechercher un flux</strong></div>
       <div class="panel-body">
           <form method="get" action="rech_suivi_mat.php" >
            <div class="form-group">
              <label >Entrez l'INF:</label>
              <input type="search" name="ok" placeholder="Entrez l'indice de l'element a rechercher" autocomplete="off" class="form-control">
              <br>

            <button type="submit" class="btn btn-success"><strong>Rechercher</strong> </button>
            </div> 
               
               
    
                <br><br>
               
               <?php if($_SESSION['user']['role']=='Admin') { ?>

                <a href="AjoutFlux.php" class="btn btn-primary"><strong>Ajouter un flux</strong> </a>
                
               <?php } ?>
               

               
             

                 

                
           
           </form>
           </div>
       </div>
       
       <SECTion class="affichage INF">

       
       <div class="panel panel-primary">
       <div class="panel-heading"><center><strong>Liste des flux associer a la recherche...</strong></center></div>
       <div class="panel-body">

       <div class="table-responsive"> 
           <table class="table table-striped table-bordered table-hover">
             <thead>
             <tr>
                <th>Flux-N°</th>
                <th>INF</th>
                <th>Utilisateur_btl</th>
                <th>Nom_direction</th>
                <th>Site</th>
                <th>E-mail-Utilisateur</th>
                <th>Date d'attribution</th>
                <th>Motif</th>
                
            </tr>
               
               </thead>
               <tbody>
                  
               <?php

if($select->rowCount() > 0){
    while($inf = $select->fetch()){

        ?>
        <td><?=$inf['idM']; ?></td>

        <td><?=$inf['INF']; ?></td>
        <td><?=$inf['Utilisateur_btl']; ?></td>
        <td><?=$inf['Nom_direction']; ?></td>
        <td><?=$inf['Site']; ?></td>
        <td><?=$inf['email']; ?></td>
        <td><?=$inf['Date']; ?></td>
        <td><?=$inf['motif']; ?></td>
    
    </tr>

        <?php
    }

} else{
  
    ?>
    <p><strong><font color="red">Aucun resultat relative a votre recherche, verifiez l'horthographe et reesayez.</font></strong></p>
    <?php
}

?>


</SECTion>
                  
               
               </tbody>
           
           </table>

                       </div>
           </div>
       </div>

  </div>

   



                      

 </body>

  
<footer class="footer">
      <div class="container">
        <p class="text"><p>Copyright &copy; 2022.    Done by <strong>Ngnetchedjeu Steeve</strong> alias <strong>Microsoft.</strong>
<br/><strong>All rights reserved.</strong></p>
      </div>
    </footer>
                      
    
</html>



