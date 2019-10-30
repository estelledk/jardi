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
    if ($page == '/index.php')  //si page courante est /index.php
    {?>
        <link rel="stylesheet" href="assets/css/body.css"><?php   
    } 
    else  //si page courante pas index
    {?> 
        <link rel="stylesheet" href="../assets/css/body.css"><?php 
    }?>

    <title>JARDITOU</title>
</head>


<body class="bgcss">

    <div class="container-fluid nav1-bgcss pt-3 pb-3"> <?php    //class="container-fluid" permet de faire une marge à gauche        
        if ($page == '/index.php')  //si page courante est /index.php
        { ?>
            <div class="row"><br>
                <div class="col-lg-4">
                </div>

                <div class="col-lg-4 text-center">                   <!-- img logo -->                
                        <a href="index.php" title="lien vers la page d'accueil de Jarditou"><img src="assets/img/jarditou_logo.jpg" class="img-logocss"></a><br><br>        
                </div>
                
                <div class="col-lg-4"> <?php            
                        if (!isset($_SESSION['login']) ) //si pas login   <!-- connexion via index -->
                        { ?>                    
                            <a href="views/login.php" id="login" title="lien pour se connecter"><img src="assets/img/login.png" class="img-logincss"></a> <?php                        
                        } 
                        else //si login                            <!-- déconnexion via index -->
                        { ?> 
                            <button type="button" class="btn btn-info">    
                                <span><a class="btn btn-outline-dark btn-sm" id="logout" href="controler/ctrlLogout.php"><?php echo $_SESSION['login']." (se déconnecter)";?></a></span>
                            </button> <?php   
                        } ?>            
                </div>
            </div> <?php
        }  
        else  //si page courante pas index
        { ?> 
            <div class="row pt-3 pb-3">
                <div class="col-lg-4">
                </div>

                <div class="col-lg-4 text-center">                   <!-- img logo -->                 
                    <a href="../index.php" title="lien vers la page d'accueil de Jarditou"><img src="../assets/img/jarditou_logo.jpg" class="img-logocss"></a><br><br>  
                </div>

                <div class="col-lg-4"> <?php       
                    if (!isset($_SESSION['login']) ) //si pas login   <!-- connexion via page autre que index -->
                    { ?>                    
                        <a href="login.php" id="login" title="lien pour se connecter"><img src="../assets/img/login.png" class="img-logincss"></a> <?php                        
                    } 
                    else //si login                                     <!-- déconnexion via page autre que index -->
                    { ?> 
                        <button type="button" class="btn btn-info">    
                            <span><a class="btn btn-outline-dark btn-sm" id="logout" href="../controler/ctrlLogout.php"><?php echo $_SESSION['login']." (se déconnecter)";?></a></span>
                        </button> <?php   
                    } ?>    
                </div>
            </div> <?php
        } ?>
    </div>