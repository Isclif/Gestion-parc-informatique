<?php

 require_once("identifier.php");
     ?>
   
<?php
    
    require_once("connexion.php");

    $select = $db->query("SELECT * FROM user ORDER BY Iduser desc");

    if(isset($_GET['ok']) AND !empty($_GET['ok'])){

        $flux = htmlspecialchars($_GET['ok']);

        $select = $db->query('SELECT * FROM user WHERE login Like "%'.$flux.'%"  ORDER BY Iduser desc');  
    }


    ?>
<!DOCTYPE HTML>
<html>
   <head>
     <meta charset="utf-8">
       <title>  Comptes</title>
       <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
       <link rel="stylesheet" type="text/css" href="monstyle.css">
    
    </head>
   <BODY>
       <?php include("menu.php");?>
       
        <br><br><br>
  <div class ="container">
      <div class="panel panel-warning" margetop60>
       <div class="panel-heading"><strong>Rechercher Compte</strong></div>
       <div class="panel-body">
           <form method="get" >
            <div class="form-group">
              <label >Entrez le login du compte: </label>
              <input type="search" name="ok" placeholder="Entrez l'indice de login a rechercher" autocomplete="off" class="form-control">
              <br>
            <button type="submit" class="btn btn-success"><strong>Rechercher</strong> </button>
            </div> 
         
           </form>
          
       <SECTion class="affichage INF">


    

       
           <!-- bouton supprimer l'utilisateur'-->


           <?php

if(isset($_GET['delete']))

{
$user = $_GET['delete'];

$sql = "DELETE FROM `gestion_parc`.`user` WHERE `user`.`login` = '$user'";

$query = $db->query($sql);

if($query)

{
    $reponse = "utilisateur supprimer avec success";
echo '<center><div class = "alert alert-success">' .$reponse. '</div></center>';
header('Refresh:1; url=comptes.php');
}


}
?>


        <br><br>
     
  

      
 <div class="table-responsive"> 
     <table class="table table-striped table-bordered table-hover" >

         <thead>
         <tr><th>Numero</th>
             <th>Login</th>
             <th>Role</th>
         <th>Email</th>
         <th>password</th>
        
         <td colspan=2 align="center"><strong>Actions</strong></td>
        </tr>
        </thead>
        <tbody>
        <?php   if($select->rowCount() > 0){  $i=0;

            while($inf = $select->fetch()){

                $i++;  ?>

            <tr>
            <td><?=$i; ?> </td>
                <td><?=$inf['login']; ?> </td>
                <td><?=$inf['role']; ?> </td>
                <td><?=$inf['email']; ?> </td>
                <td><?=$inf['pwd']; ?> </td>
  
                                  <td>
  
                                <center><a onclick="return confirm('etes vous sur de vouloir supprimer ce compte du parc? ')" 
                                        href="comptes.php?delete=<?=$inf['login']; ?> " class="btn btn-danger">supprimer</a>
                                </center> 
                               
                                
                   
                               
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

