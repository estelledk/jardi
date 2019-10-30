<nav class="navbar navbar-expand-lg navbar-light nav2-bgcss">

<!-- index n'est pas au même niveau d'arborescence que les autres views, donc gestion du chemin pour affichage des vues : -->
    <?php
    if ($page == '/index.php') { ?>  <!-- si page courante est /index.php -->
<!-- accueil -->
        <a class="navbar-brand text-dark" href="index.php">Accueil</a>  <!-- class="navbar-brand" taille texte + grande -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span> 
            </button> <!-- bouton collapse (hamburger) avec lien actif grâce à data-target//id dans la div -->

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
<!--catalogue--><li class="nav-item active">  
                    <a class="navbar-brand text-dark" href="views/catalogue.php">Catalogue</a>
                </li>

<!--products--> <li class="nav-item active"> <?php                   
                    if (isset($_SESSION['use_rol_id']) && ($_SESSION['use_rol_id'] == 1)) { ?> <!-- si l'utilisateur est l'admin ['use_rol_id'] == 1 (=admin) on affiche un bouton -->
                        <a class="navbar-brand text-dark" href="views/products.php">Gestion des produits</a> <?php
                    } 
                    else { ?> <!-- si pas admin -->
                        <a class="navbar-brand text-dark" href="views/products.php">Produits</a> <?php
                    } ?>
                </li>
            </ul>
               
<!--rech--> <form class="form-inline my-2 my-lg-0" action="views/recherch.php" method="POST">
                <input name="pro_id" type="text" class="form-control mr-sm-2" placeholder="ID du produit">
                <button type="submit" class="btn btn-outline-info my-2 my-sm-0"><img src="assets/img/loupe.png" class="img-loupecss"></a></button>
            </form>
        </div> <?php
    } 
    
    else { ?> <!-- si page courante pas index -->
<!-- accueil -->                                                
        <a class="navbar-brand text-dark" href="../index.php">Accueil</a>  
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span> 
            </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
<!--catalogue--><li class="nav-item active"> 
                    <a class="navbar-brand text-dark" href="catalogue.php">Catalogue</a>
                </li>

<!--products--> <li class="nav-item"> <?php               
                    if (isset($_SESSION['use_rol_id']) && ($_SESSION['use_rol_id'] == 1)) { ?>   <!-- si ['use_rol_id'] == 1 (=admin) on colorie le bouton -->
                        <a class="navbar-brand text-dark" href="products.php">Gestion des produits</a> <?php
                    } 
                    else { ?> <!-- si pas admin -->
                        <a class="navbar-brand text-dark" href="products.php">Produits</a> <?php
                    } ?>
                </li>
            </ul>

<!--rech--> <form class="form-inline my-2 my-lg-0" action="recherch.php" method="POST">
                <input name="pro_id" type="text" class="form-control mr-sm-2" placeholder="ID du produit">
                <button type="submit" class="btn btn-outline-info my-2 my-sm-0"><img src="../assets/img/loupe.png" class="img-loupecss"></a></button>
            </form>
        </div> <?php
    } ?>
</nav>