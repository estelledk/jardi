<?php 
include('header1headSession.php'); 
?><title>produits</title><?php
// include ('header2bodyImg.php');
include('header3Navbar.php');

include('../controler/connexionBase.php');  //lance la fonction connexionBase qui est dans le fichier connexion_bdd
$db = connexionJardi();  // appel de la fonction de connexion
include('../model/modProductDetails2.php'); //requêtes du formulaire, include noté après include de la connexion bdd
?>



<!-- action -->
<form action="" method="post" enctype="multipart/form-data">
<div class="jumbotron">
<div class="container">  <!-- col ajustées  -->


<!-- ID -->
	<div class="form-group col-xs-6">
		<label for="pro_id">ID</label>
		<input type="text" name="pro_id" class="form-control" disabled value="<?php echo $fetch->pro_id; ?>" readonly="readonly">
		<!-- readonly="readonly" fige la valeur, pas possiblité de la modifier  -->
        <!-- __l'objet "produit" contient l'ensemble des champs de la ligne que l'on veux afficher. -->
        <!-- __afin d'afficher chaque colonne de notre ligne nous allons utiliser la constrution "objet->nom_de_la_propriété". -->
	</div>
<!-- reference -->	
	<div class="form-group col-xs-6">
		<label for="pro_ref">Référence</label>
		<input type="text" name="pro_ref" class="form-control" disabled value="<?php echo $fetch->pro_ref; ?>">
	</div>
<!-- categorie -->				
	<div class="form-group col-xs-6">
		<label for="pro_cat_id">Catégorie</label>
		<input type="text" name="pro_cat_id" class="form-control" disabled value="<?php echo $fetch->pro_cat_id; ?>">
	</div>
<!-- libelle -->	
	<div class="form-group col-xs-6">
		<label for="pro_libelle">Libellé</label>
		<input type="text" name="pro_libelle" class="form-control" disabled value="<?php echo $fetch->pro_libelle; ?>">
	</div>
<!-- description -->		
	<div class="form-group col-xs-6">
		<label for="pro_description">Description</label>
		<textarea name="pro_description" class="form-control" disabled cols="150" rows=auto><?php echo $fetch->pro_description; ?></textarea>
	</div>
<!-- prix -->
	<div class="form-group col-xs-6" class="text-right">
		<label for="pro_prix">Prix</label>
		<input type="text" name="pro_prix" class="form-control" disabled value="<?php echo $fetch->pro_prix; ?>">		
	</div>
<!-- stock -->		
	<div class="form-group col-xs-6">
		<label for="pro_stock">Stock</label>
		<input type="text" name="pro_stock" class="form-control" disabled value="<?php echo $fetch->pro_stock; ?>">
	</div>
<!-- couleur -->
	<div class="form-group col-xs-6">
		<label for="pro_couleur">Couleur</label>
		<input type="text" name="pro_couleur" class="form-control" disabled value="<?php echo $fetch->pro_couleur; ?>">
	</div>

<!-- bloque -->
	<div class="form-row">
		<div class="form-group col-l-6">
			<?php 
			if ($fetch->pro_bloque == 1) 
			{ ?>
				<label>Bloqué :  oui</label>
					<input type="radio" name="pro_bloque" value="1" checked>
				<label>non</label>
					<input type="radio" name="pro_bloque" value="0">
					<?php 
			} else 
			{ ?>
				<label>Bloqué :  oui</label>
					<input type="radio" name="pro_bloque" value="1">	
				<label>non</label>
					<input type="radio" name="pro_bloque" value="0" checked>
					<?php 
			} ?>
		 </div>
	</div>
<!-- date d ajout -->	
	<span name="pro_d_ajout" class="form-control">
		<?php echo "Date d'ajout : " .$fetch->pro_d_ajout; ?>
    </span><br>
<!-- date modif -->			
	<span name="pro_d_modif" class="form-control">
		<?php echo "Date de modification : " .$fetch->pro_d_modif; ?>
	</span><br><br>
	
<!-- valider -->	
    <a href="products.php" class="d-flex justify-content-center"><input name="retour" type="button" class="btn btn-info" value="retour à la liste de produits"></a>
				<!-- class="d-flex justify-content-center"> : pour centrer -->
    
</div></div>
</form>

<?php
$requete->closeCursor();  //closeCursor() clôt le Fetch()
    //pas obligatoire de l'utiliser. Mais par mesure de sécurité en cas de changement de gestionnaire de BDD, il est préférable de le mettre

include ('footer.php');
?>
</body>
</html>