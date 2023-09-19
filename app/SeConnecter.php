<?php 

session_start();

require_once('connexion.php');
$login=isset($_POST['login'])?$_POST['login']:"";
$pwd=isset($_POST['pwd'])?$_POST['pwd']:"";

$requete="SELECT * FROM user WHERE login='$login' AND pwd=MD5('$pwd')";
$resultat=$db->query($requete);

if($user=$resultat->fetch()){

   /*if($user['etat']==1){*/
        $_SESSION['user']=$user;
        header('location:index1.php');
    /*}else{
        $_SESSION['erreurLogin']="<strong>Erreur!!</strong> Votre compte est desactiver.<br> veuillez contacter l'administrateur";
        header('location:login.php');
    }*/

}else{
    $_SESSION['erreurLogin']="<strong>Erreur!!</strong> login ou Mot de passe incorrect!!!";
    header('location:login.php');
}


?>






  
     

    



       
 