<?php
session_start();
if(isset($_SESSION['erreurLogin']))
$erreurLogin=$_SESSION['erreurLogin'];

else{
    $erreurLogin="";
}
session_destroy();

?>
<?php  require_once('connexion.php');  ?>



<html>
   <head>


     <meta charset="utf-8">
       <title> connexion</title>
       <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="monstyle.css">
    
    </head>
   <BODY>


  
        <br><br><br>


  <div class ="container col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-4 ">

     
  
      <div class="panel panel-info" margetop60>
       <div class="panel-heading"><center><Strong>Connexion</Strong></center></div>
       <div class="panel-body">
           <form method="POST" action="SeConnecter.php" class="form" >

           <?php if(!empty($erreurLogin)) {?>

           <div class="alert alert-danger"> 
               
           <?php echo $erreurLogin ?>


           </div>

           <?php }?>

            <div class="form-group">
              <label >Login:</label>
              <input type="text" name="login"  autocomplete="off" class="form-control">
              <br>
</div>
<div class="form-group">
              <label >Mot de passe:</label>
              <input type="password" name="pwd"  autocomplete="off" class="form-control">
              <br>

</div>

               
            <button type="submit" class="btn btn-success"><strong>Se connecter</strong> </button>
            &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp 
            <a href="creerNouveauCompte.php">Creer un nouveau compte</a>
            
  </form>

  </body>

</html>

       

        
       