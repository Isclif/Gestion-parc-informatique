<?php require_once("identifier.php"); ?>

<?php


require_once("connexion.php");






//preparation de la requette

$requette = $db->prepare("UPDATE `materiel` SET nature=:nature, date_entree=:date_entree, Date_sortie=:Date_sortie, Num_config_ancien=:Num_config_ancien, Num_config_nouveau=:Num_config_nouveau, INF=:INF,  Numero_serie=:Numero_serie, Etat=:Etat, Mode_migration=:Mode_migration, Date_migration=:Date_migration, Cout_materiel=:Cout_materiel WHERE Numero=:numero LIMIT 1" );

//liaison du parametre nommee

$requette->bindValue(':numero' ,$_POST['edit'], PDO::PARAM_INT);
$requette->bindValue(':nature' ,$_POST['Nature'], PDO::PARAM_STR);
$requette->bindValue(':date_entree' ,$_POST['Date_entree'], PDO::PARAM_STR);
$requette->bindValue(':Date_sortie' ,$_POST['Date_sortie'], PDO::PARAM_STR);
$requette->bindValue(':Num_config_ancien' ,$_POST['Num_config_ancien'], PDO::PARAM_STR);
$requette->bindValue(':Num_config_nouveau' ,$_POST['Num_config_nouveau'], PDO::PARAM_STR);

$requette->bindValue(':INF' ,$_POST['INF'], PDO::PARAM_STR);


$requette->bindValue(':Numero_serie' , $_POST['Numero_serie'], PDO::PARAM_STR);
$requette->bindValue(':Etat' , $_POST['Etat'], PDO::PARAM_STR);
$requette->bindValue(':Mode_migration' , $_POST['Mode_migration'], PDO::PARAM_STR);
$requette->bindValue(':Date_migration' , $_POST['Date_migration'], PDO::PARAM_STR);
$requette->bindValue(':Cout_materiel' , $_POST['Cout_materiel'], PDO::PARAM_INT);



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
       <a href="materiel.php" class="btn btn-success">afficher la liste des equipements</a>

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
