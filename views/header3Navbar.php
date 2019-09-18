<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

<!-- GESTION PB ARBORESCENCE LIENS NAVBAR entre index et autres fichiers -->

    <?php
    if ($page == '/index.php')  //si page courante est /index.php
    { ?>
<!-- accueil -->
        <a class="navbar-brand" href="index.php">Accueil</a>  <!-- class="navbar-brand" taille texte + grande -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span> 
            </button> <!-- bouton collapse (hamburger) avec lien actif grâce à data-target//id dans la div -->

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
<!-- mentionsLegales -->
                <li class="nav-item">
                    <a class="nav-link" href="views/mentionsLegales.php">Mentions légales</a>
                </li>
<!-- formulaire -->
                <li class="nav-item">
                    <a class="nav-link" href="views/formulaireClient.php">Formulaire-client</a>
                </li>
<!-- products -->
                <li class="nav-item active">
                    <?php 
                    if ( isset($_SESSION['use_rol_id']) && ($_SESSION['use_rol_id'] == 1) )  //si ['use_rol_id'] == 1 (=admin) on affiche un bouton
                    { ?>    
                        <button type="button" class="btn btn-info">
                            <a class="navbar-brand" href="views/products.php">Produits</a>
                        </button>
                        <?php

                    } else //si pas admin
                    { ?>
                        <a class="navbar-brand" href="views/products.php">Produits</a>
                        <?php
                    } ?>
                </li>

            </ul>
<!-- recherche -->                
            <form class="form-inline my-2 my-lg-0" action="views/recherch.php" method="POST">
                <input name="pro_id" type="text" class="form-control mr-sm-2" placeholder="Notez l'ID du produit">
                <button type="submit" class="btn btn-secondary my-2 my-sm-0">Recherche</button>
            </form>
        </div>
</nav>
<!-- img promotion -->
        <img src="assets/img/promotion.jpg" title="promotion sur les lames de terrasse" class="bandeau-image">
        <?php


    } else //si page courante pas index
    { ?>
<!-- accueil -->
        <a class="navbar-brand" href="../index.php">Accueil</a>  <!-- class="navbar-brand" taille texte + grande -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span> 
            </button>  <!-- bouton collapse (hamburger) avec lien actif grâce à data-target//id dans la div -->

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
<!-- mentionsLegales -->
                <li class="nav-item">
                    <a class="nav-link" href="mentionsLegales.php">Mentions légales</a>
                </li>
<!-- formulaire -->
                <li class="nav-item">
                    <a class="nav-link" href="formulaireClient.php">Formulaire-client</a>
                </li>
<!-- products -->
                <li class="nav-item">
                <?php 
                    if ( isset($_SESSION['use_rol_id']) && ($_SESSION['use_rol_id'] == 1) )  //si ['use_rol_id'] == 1 (=admin) on colorie le bouton
                    { ?>    
                        <button type="button" class="btn btn-info">
                            <a class="navbar-brand" href="products.php">Produits</a>
                        </button>
                        <?php

                    } else //si pas admin
                    { ?>
                        <a class="navbar-brand" href="products.php">Produits</a>
                        <?php
                    } ?>
                </li>
            </ul>
<!-- recherche -->                
            <form class="form-inline my-2 my-lg-0" action="recherch.php" method="POST">
                <input name="pro_id" type="text" class="form-control mr-sm-2" placeholder="Notez l'ID du produit">
                <button type="submit" class="btn btn-secondary my-2 my-sm-0">Recherche</button>
            </form>
        </div>
</nav>
<!-- img promotion -->
        <img src="../assets/img/promotion.jpg" title="promotion sur les lames de terrasse" class="bandeau-image" style="width:100%;">
        <?php
    } ?>

<!-- -->