<?php

$user = 'epiz_32974815';
$pass = 'o9UIolLp2qU67';
try {
    $db = new PDO ('mysql:host=sql110.epizy.com;dbname=epiz_32974815_Gestion', $user, $pass);
   

} catch (PDOException $e)
{
    echo "Erreur : . $e->getMessage() . <br/>";
    die;
}

?>
