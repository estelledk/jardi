<?php
session_start();  //utilisé sur autres pages 

$page = strrchr($_SERVER['SCRIPT_NAME'], '/');  //variable prenant l'adresse de la page courante
?>

<!DOCTYPE html>
<html>
<head>
    <!-- responsive -->                                            
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">  <!-- s'adapte à la taille écran -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <meta charset="UTF-8">
    
    <!-- index n'est pas au même niveau d'arborescence que les autres views, donc gestion du chemin pour affichage des vues : -->
    <?php 
    if ($page == '/index.php') { ?>     <!-- si page courante est /index.php -->
        <link rel="stylesheet" href="assets/css/body.css"><?php   
    } 
    else { ?>   <!-- si page courante pas index -->
        <link rel="stylesheet" href="../assets/css/body.css"><?php 
    }?>

    <title>JARDITOU</title>
</head>

<body>
<?php       
if ($page == '/index.php') { ?>    <!-- si page courante est /index.php --> 
    <a href="index.php" title="retour accueil"><img src="assets/img/jarditou_logo.jpg"></a><br><br> <?php

    if (!isset($_SESSION['login']) ) { ?>   <!-- si pas login ; connexion via index -->   
        <a href="views/login.php" id="login" title="lien connexion"><img src="assets/img/login.png"></a> <?php                        
    } 
    else { ?>   <!-- si login ; déconnexion via index -->
        <button type="button">    
            <span><a id="logout" href="controler/ctrlLogout.php"><?php echo $_SESSION['login']." (se déconnecter)";?></a></span>
        </button> <?php   
    } 
}  
else { ?>  <!-- si page courante pas index -->
    <a href="../index.php" title="retour accueil"><img src="../assets/img/jarditou_logo.jpg"></a><br><br> <?php

    if (!isset($_SESSION['login']) ) { ?> <!-- si pas login ; connexion via page autre que index -->        
        <a href="login.php" id="login" title="lien connexion"><img src="../assets/img/login.png"></a> <?php                        
    } 
    else { ?> <!-- si login ; déconnexion via page autre que index -->
        <button type="button">    
            <span><a id="logout" href="../controler/ctrlLogout.php"><?php echo $_SESSION['login']." (se déconnecter)";?></a></span>
        </button> <?php   
    }
} ?>
