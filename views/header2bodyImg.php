
    <title>JARDITOU</title>

<!-- GESTION PB ARBORESCENCE POUR LIEN CSS entre index et autres fichiers -->
<?php 
if ($page == '/index.php')  //si page courante est /index.php
{ ?>
    <link rel="stylesheet" href="assets/css/header.css">
    <?php

} else  //si page courante (n'est pas index) est une des pages dans views
{ ?>    
    <link rel="stylesheet" href="../assets/css/header.css">
    <?php
} ?>
<!-- -->
</head>


<body>
<div class="container-fluid bg-dark">
<!-- class="container-fluid" permet de faire une marge à gauche -->
<br>
    <div class="form-row"><br>

<!-- img logo -->
        <div class="col-lg-6">
    <!-- GESTION PB ARBORESCENCE POUR IMG ET LIEN SUR IMG entre index et autres fichiers -->
            <?php 
            if ($page == '/index.php')  //si page courante est /index.php
            { ?>
                <img src="assets/img/jarditou_logo.jpg" title="logo Jarditou" width="300" style="height:auto;">
                <?php
            } else  //si page courante (n'est pas index) est une des pages dans views
            { /* LIEN OU NON SUR LE LOGO */    
                //si page courante est fichier "msg" ou "log" on fait un lien sur le logo
                if ( ($page == '/msgLogError1.php') || ($page == '/msgLogError2.php') || ($page == '/msgProductCreate.php') || ($page == '/msgProductDelete1.php') || ($page == '/msgProductDelete2.php') || ($page == '/msgProductUpdate.php') || ($page == '/msgRegistSame.php') || ($page == '/msgRegistValid.php') || ($page == '/login.php') || ($page == '/logRegist.php') )  
                { ?>
                    <a href="../index.php" title="lien vers la page d'accueil de Jarditou"><img src="../assets/img/jarditou_logo.jpg" width="300"></a><br>
                    <?php
                } else //si pas fichier "msg", on laisse le logo tel quel
                { ?>
                    <img src="../assets/img/jarditou_logo.jpg" title="logo Jarditou" width="300">
                    <?php
            /* */
                }
            }
        ?>
    <!-- -->
            <br><span class="text-light">La qualité depuis 70 ans</span><br><br>
        </div>
        
<!-- gestion produits -->
        <!-- <div class="col-lg-4">
            <span>
            <php 
                if (isset($_SESSION['login'])) 
                { 
            >
                    <button type="button" class="btn btn-info">
                    <a class="btn btn-info" href="productsManagement.php">Gestion des produits</a> 
                    </button>
            <php 
                } else 
                    {} 
            >
            </span>      
        </div> -->


        <div class="col-lg-2">
        <!-- GESTION PB ARBORESCENCE POUR BOUTONS IDENTIFICATION ET DECONNEXION entre index et autres fichiers -->
        <?php 
            //si page courante est /msg...php ou log...php
            if (($page == '/msgLogError1.php') || ($page == '/msgLogError2.php') || ($page == '/msgProductCreate.php') || ($page == '/msgProductDelete1.php') || ($page == '/msgProductDelete2.php') || ($page == '/msgProductUpdate.php') || ($page == '/msgRegistSame.php') || ($page == '/msgRegistValid.php') || ($page == '/login.php') || ($page == '/logRegist.php') )  
            {  //on n'affiche pas boutons 

            } else if (($page == '/index.php'))  //si la page courante est /index.php
            {
                if (!isset($_SESSION['login']) )  //si pas login 
                { ?>
                    <button type="button" class="btn btn-info">
                        <span>
<!-- index/identification--> 
                            <a class="btn btn-info" id="login" href="views/logRegist.php">Identification</a>
                        </span>
                    </button>
                <?php
                } else //si login
                { ?>
                    <button type="button" class="btn btn-info">
                        <span>
<!-- index/déconnexion -->
                            <a class="btn btn-info" id="logout" href="controler/ctrlLogout.php"><?php echo $_SESSION['login']." (se déconnecter)";?></a>
                        </span>
                    </button>
                <?php   
                }
            } else //si pas courante pas "msg" ni index
            {
                if (!isset($_SESSION['login']) ) //si pas de présence de login 
                { ?>
                    <button type="button" class="btn btn-info">
                        <span>
<!-- pages navbar/identification --> 
                            <a class="btn btn-info" id="login" href="logRegist.php">Identification</a> 
                        </span>
                    </button>
                <?php 
                } else //si login
                { ?>
                    <button type="button" class="btn btn-info">
                        <span>
<!-- pages navbar/déconnexion -->     
                            <a class="btn btn-info" id="logout" href="../controler/ctrlLogout.php"><?php echo $_SESSION['login']." (se déconnecter)";?></a> 
                        </span>
                    </button>
                <?php
                } 
            }?>
            
        </div>
    </div>
</div>