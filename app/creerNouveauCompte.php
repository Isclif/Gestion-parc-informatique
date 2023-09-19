<?php
require_once('connexion.php');
?>

<?php

   if(isset($_POST['inscription'])){
    
    $login = htmlspecialchars($_POST['login']);
    $pwd1 = $_POST['pwd1'];
    $pwd2 = $_POST['pwd2'];
    $email = htmlspecialchars($_POST['email']);

    if(!empty($_POST['login']) AND !empty($_POST['pwd1']) AND !empty($_POST['pwd2']) AND !empty($_POST['email']))
    {
      if($pwd1 == $pwd2)
      {
        if(filter_var($email, FILTER_VALIDATE_EMAIL))
        {
          $insert = $db ->prepare(" INSERT INTO `user`( `login`, `email`, `pwd`) VALUES (?, ?, ?)");
          $insert->execute(array($login, $email, md5("$pwd1"))) ;
          $compteCreer = "Votre compte a bien ete creer";
          echo '<center><div class = "alert alert-success">' .$compteCreer. '</div> <a href = "login.php" class="btn btn-success">Se connecter</a> </center>';
          /*header("location:login.php");*/

        }
        else
        {
          $erreur = "Email non valide";
        }
      }
      else
      {
        $erreur = "les mots de passe ne sont pas identiques";
      }
    }
    else
    {
      $erreur = "Tous les champs doivent etre completer!";
    }
   }
?>


<html>
   <head>


     <meta charset="utf-8">
       <title> Nouveau-compte</title>
       <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="monstyle.css">

    </head>
   <body>


  
        <br><br><br>


  <div class ="container col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-4 ">

     <h2 class="text-center">Creation d'un nouveau compte</h2>
     
     
           <form method="POST" class="form" action = "">

           

          <?php if(isset($erreur))
            {
              echo '<div class = "alert alert-danger">' .$erreur. '</div>';
            } 
            ?>


<br>
           <div class="input-container">

           <input type="text"
           minlenght="4"
           title="le login doit contenir au moins 4 caracteres..."
           name="login"
           placeholder="Taper votre Login"
           autocomplete="off"
           style="
           width : 100%; 
           background: white; 
           outline: none;
           padding: 5px;
           border-radius: 6px;" 
           id = "login"
           value = "<?php if(isset($login)) { echo $login ;} ?>">
           
         
           </div>
<br>
           <div class="input-container">

           <input type="password"
           minlenght="4"
           title="le mot de passe doit contenir au moins 4 caracteres..."
           name="pwd1"
           placeholder="Taper votre mot de passe"
           autocomplete="new-password"
           style="
           width : 80%;
           background: white; 
           outline: none;
           padding: 5px;
           border-radius: 6px;"
           id = "password1" >
           
         <img src = "images/eyeClose.png" width="50px" height="30px" id = "eye" Onclick = "changer()" style="cursor: pointer;"></img>
           </div>
           
<br>
            
           <div class="input-container">

           <input type="password"
           minlenght="4"
           title="le mot de passe doit contenir au moins 4 caracteres..."
           name="pwd2"
           placeholder="Retaper votre mot de passe pour confirmer"
           autocomplete="new-password"
           style="
           width : 80%;
           background: white; 
           outline: none;
           padding: 5px;
           border-radius: 6px;"
           id = "password2">
           <img src = "images/eyeClose.png" width="50px" height="30px" id = "eye1" Onclick = "changer1()" style="cursor: pointer;"></img>
         
           </div> 

<br>

           <div class="input-container">

           <input type="email"
           
          
           name="email"
           placeholder="taper votre adresse E-mail"
           autocomplete="off"
           style="
           width : 100%;
           background: white; 
           outline: none;
           padding: 5px;
           border-radius: 6px;"
           id = "email"  
           value = "<?php if(isset($email)) { echo $email ;} ?>">
           
         
           </div>

                      
           <h5> Indication : <br>
              votre mot de passe doit contenir au moins:
                <span id = "majuscule" class = "invalid">une majuscule</span> /
                <span id = "minuscule" class = "invalid">une minuscule</span> /
                <span id = "chiffre" class = "invalid">un chiffre</span> /
                <span id = "caracteres" class = "invalid"> 8 carateres</span> <br>
            </h5>


<br>

            <input type="submit" name = "inscription" class="btn btn-primary" value="creer mon compte">
 
  </form>
</div>
  
  <script src="testNewCompte.js"></script>


</body>
</html>





