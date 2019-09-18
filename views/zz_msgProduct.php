<?php 
include ('header1headSession.php'); ?>
	<link rel="stylesheet" href="../assets/css/login.css">
	<title>ajout de produit</title>
	<?php
include ('header2bodyImg.php');

include ('../controler/ctrlFormCreate.php');
?>
	
<!-- création -->
    <?php
    if (isset($_POST['submitCreate'])
    { ?>
        <h1 class="text-center">Confirmation</h1>
        <form>  <!-- pour appliquer css lié à form --> 
            <div class="container-fluid text-center">
                <h4>Le produit a été ajouté</h4><br><br>
                <a href="products.php" title="Retour à la liste de produits" class="btn btn-success">Retour à la liste de produits</a>
                <br><br>
            </div>
        </form>
        <?php
    } else
    {}
    ?>

<!-- modification -->


<!-- suppression -->
    <?php
    if (isset($_POST['submitCreate'])
    { ?>
        <h1 class="text-center">Modification</h1>
        
        <form>  <!-- pour appliquer css lié à form --> 
            <div class="container-fluid text-center">

                <h4>Le produit a été modifié</h4><br><br>

    <!-- retour -->
                <a href="products.php" title="Retour à la liste de produits" class="btn btn-success">Retour à la liste de produits</a>

            </div>
        </form>
        <?php
    } ?>



<?php
include ('footer.php'); ?>
</body>
</html>