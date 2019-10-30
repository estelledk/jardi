<?php
include('header1headSession.php'); 
include('header3Navbar.php');
?><title>Liste des produits</title><?php

include('../controler/ctrlCatalogue.php');
?>


<div class="container-fluid bgcss">
    <br><br>
    <div class="row">
        <?php foreach($fetchProdJoinCat as $row) 
        { ?> 
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 pt-5">
                <div class="card bg-light mb-3" style="max-width: 18rem; max-height: 48rem;">
                    <div class="card-body">                                                    
                        <p class="card-text">
                        <a href="productById.php?pro_id=<?php echo $row->pro_id ?>" title="Lien pour afficher la fiche produit">
                            <img class="img-thumbnail" src="../../ci/assets/img/<?php echo $row->pro_id . "." . $row->pro_photo ?>" alt="image de <?php echo $row->pro_libelle ?>">
                        </a>
                        </p>
                        <h5 class="card-title text-center"><?php echo $row->pro_libelle ?></h5>
                        <div> <?= $row->cat_nom ;?></div>

                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 text-center">
                                <input type="hidden" name="pro_prix" value="<?= $row->pro_prix ?>">
                                <b><?php echo $row->pro_prix ?> €</b>
                            </div> 
                            <div class="col-lg-2 col-md-2 col-sm-5 col-xs-6">
                                <input class="form-control" name="pro_qte" id="pro_qte" value="1" style ="width:45px;">
                            </div>
                            <input type="hidden" name="pro_id" value="<?= $row->pro_id ?>">
                            <input type="hidden" name="pro_libelle" value="<?= $row->pro_libelle ?>">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5">
                                <div class="form-group">
                                    <input class="btn btn-info" type="submit" value="Ajout">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        <?php
        } ?>
    </div>

    <br><br><br>

    <?php
    
    include('footer.php'); 
    ?>
</div>

</body>
</html>