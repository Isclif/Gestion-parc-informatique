<?php require_once("identifier.php"); ?>

<?php include("menu.php"); ?>



<?php
    
    require_once("connexion.php");

    $select = $db->query("SELECT * FROM corbeille ORDER BY idc desc");

    if(isset($_GET['ok']) AND !empty($_GET['ok'])){

        $flux = htmlspecialchars($_GET['ok']);

        $select = $db->query('SELECT * FROM corbeille WHERE Nature Like "%'.$flux.'%"  ORDER BY idc desc');  
    }


    ?>





<html>
   <head>


     <meta charset="utf-8">
       <title> Archives</title>
       <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="monstyle.css">
    
    </head>
   <BODY>


  
        <br><br><br>


  <div class ="container">

     
  
      <div class="panel panel-warning" margetop60>
       <div class="panel-heading"><center><Strong>Materiel archives</Strong></center></div>
       <div class="panel-body">
           <form method="get" >
            <div class="form-group">
              <label >Entrez la nature du materiel archives:</label>
              <input type="search" name="ok" placeholder="Entrez l'indice de l'element a rechercher" autocomplete="off" class="form-control">
              <br>
            <button type="submit" class="btn btn-success"><strong>Rechercher</strong> </button>
            </div> 
  </form>

      
 <div class="table-responsive"> 
     <table class="table table-striped  table-bordered table-hover " >
         <thead class="thead-dark">
         <tr> <th>Numero </th>
         <th> Nature </th>
         <th> date_entree</th>
         <th> date_fin_de_vie</th>
         <th> ancien_num_config</th>
         <th>nouveau_num_config</th>
         <th>INF</th>
         <th>Numero de serie</th>
         <th>Etat</th>
         <th>Mode de migration</th>
         <th>Date de migration</th>
         <th>prix_materiel</th>
               
         
        </tr>
        </thead>
        <tbody>
        <?php

        if($select->rowCount() > 0){  $i=0;
            while($inf = $select->fetch()){

                $i++;?>

           
            <tr>
            <td><?=$i; ?> </td>
                <td><?=$inf['Nature']; ?> </td>
                <td><?=$inf['date_entree']; ?> </td>
                <td><?=$inf['Date_sortie']; ?> </td>
                <td><?=$inf['Num_config_ancien']; ?> </td>
                <td><?=$inf['Num_config_nouveau']; ?> </td>
                <td><?=$inf['INF']; ?> </td>
                <td><?=$inf['Numero_serie']; ?> </td>
                <td><?=$inf['Etat']; ?> </td>
                <td><?=$inf['Mode_migration']; ?> </td>                                                                                                          
                <td><?=$inf['Date_migration']; ?> </td>
                <td><?=$inf['Cout_materiel']; ?> </td>

                
                
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
  </div>

       
  
     

    




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



