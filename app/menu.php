<?php require_once("identifier.php"); ?>

<!DOCTYPE html>
<html>
    <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
     <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    

     <!-- Bootstrap core CSS -->
     <link href="css/bootstrap.min.css" rel="stylesheet">

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->


<!-- Custom styles for this template -->
<link href="monstyle.css" rel="stylesheet">


<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
<script src="js/ie-emulation-modes-warning.js"></script>

<link rel="stylesheet" href="css/bootstrap-table.min.css">



    
</head>	
<body>

 <!-- Fixed navbar -->
 <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
         <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          
          <a class="navbar-brand" href="materiel.php" > <strong> <font color="green">Gestion du parc</font></strong></a>

         </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
            <li ><a href="materiel.php">Materiels</a></li>
            <li><a href="rech_suivi_mat.php">Suivi du materiel</a></li>
            <?php if($_SESSION['user']['role']=='Admin') { ?>

            <li><a href="utilisateur.php">Les utilisateurs</a></li>
            <?php } ?>
            <?php if($_SESSION['user']['role']=='Admin') { ?>

            <li><a href="comptes.php">Comptes</a></li>
            <?php } ?>
            <li><a href="corbeille.php">Les archives</a></li>
           
           </ul>

           <ul class="nav navbar-nav navbar-right">
           <li ><a href="#"><font color="green"><?php echo $_SESSION['user']['login']?></font></a></li>
           
           <li ><a href="seDeconnecter.php">Se Deconnecter</a></li>
            <!--<li> <img src="images/c1.png" width = "100" height="50" alt="logo"> </li>-->
            </ul>   

          </div><!--/.nav-collapse -->
        </div>     

    </nav>

   


 <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  
    <script>window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
    <script src="../js/bootstrap-table.min.js"></script>
 </body>


 </html>