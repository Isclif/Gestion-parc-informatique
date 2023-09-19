
<?php require_once("identifier.php"); ?>
<!---enregistrement des modifications--->
<?php


require_once("connexion.php");






//preparation de la requette

$requette = $db->prepare("UPDATE `utilisateur` SET Utilisateur_btl=:Utilisateur_btl,Nom_utilisateur=:Nom_utilisateur,Site=:Site, `Nom_direction`=:Nom_direction, email=:email WHERE idU=:id LIMIT 1" );

//liaison du parametre nommee

$requette->bindValue(':id' ,$_POST['edit'], PDO::PARAM_INT);
$requette->bindValue(':Utilisateur_btl' ,$_POST['Utilisateur_btl'], PDO::PARAM_STR);
$requette->bindValue(':Nom_direction' ,$_POST['Nom_direction'], PDO::PARAM_STR);
$requette->bindValue(':Nom_utilisateur' ,$_POST['Nom_utilisateur'], PDO::PARAM_STR);
$requette->bindValue(':Site' ,$_POST['Site'], PDO::PARAM_STR);
$requette->bindValue(':email' ,$_POST['email'], PDO::PARAM_STR);


//execution de la requette


$executeIsOk = $requette->execute();

if($executeIsOk){

    $message="la donnee a ete mise a jour";
}
else{
    $message="la donnee n'a pas ete mise a jour";
}

?>






<!DOCTYPE HTML>
<html>
   <head>
     <meta charset="utf-8">
       <title> Resultat de la modification</title>
       <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="monstyle.css">
    
    </head>
   <BODY>
       <?php include("menu.php");?>

<br><br><br><br><br>

     <center><h1><strong>Resultat</strong> </h1> 

       <p><mark><?=$message ?></mark></P>
        
<br><br>
       <a href="utilisateur.php" class="btn btn-primary">afficher la liste des utilisateurs</a>

       </center>
      
       
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