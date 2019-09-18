<?php 
include ('header1headSession.php');
?>
	<title>produits</title>
<?php
include ('header2bodyImg.php');
include ('header3Navbar.php');

include ('../controler/connexionBase.php');  //lance la fonction connexionBase qui est dans le fichier connexion_bdd
$db = connexionJardi();  // appel de la fonction de connexion
include ('../model/modRecherch.php'); //requêtes du formulaire, include noté après include de la connexion bdd
?>


<!-- action -->
<form action="" method="post" enctype="multipart/form-data">
<div class="jumbotron">
<div class="container">  <!-- col ajustées  -->

<!-- ID -->
	<div class="form-group col-xs-6">
		<label for="pro_id">ID</label>
		<input id="pro_id" name="pro_id" type="text" class="form-control" disabled value="<?php echo $fetch->pro_id; ?>" readonly="readonly">
		<!-- readonly="readonly" fige la valeur, pas possiblité de la modifier  -->
        <!-- __l'objet "produit" contient l'ensemble des champs de la ligne que l'on veux afficher. -->
        <!-- __afin d'afficher chaque colonne de notre ligne nous allons utiliser la constrution "objet->nom_de_la_propriété". -->
	</div>
<!-- reference -->	
	<div class="form-group col-xs-6">
		<label for="pro_ref">Référence</label>
		<input id="pro_ref" name="pro_ref" type="text" class="form-control" disabled value="<?php echo $fetch->pro_ref; ?>">
	</div>
<!-- categorie -->				
	<div class="form-group col-xs-6">
		<label for="pro_cat_id">Catégorie</label>
		<input id="pro_cat_id" name="pro_cat_id" type="text" class="form-control" disabled value="<?php echo $fetch->pro_cat_id; ?>">
	</div>
<!-- libelle -->	
	<div class="form-group col-xs-6">
		<label for="pro_libelle">Libellé</label>
		<input id="pro_libelle" name="pro_libelle" type="text" class="form-control" disabled value="<?php echo $fetch->pro_libelle; ?>">
	</div>
<!-- description -->		
	<div class="form-group col-xs-6">
		<label for="pro_description">Description</label>
		<textarea id="pro_description" name="pro_description" class="form-control" disabled cols="150" rows=auto><?php echo $fetch->pro_description; ?></textarea>
	</div>
<!-- prix -->
	<div class="form-group col-xs-6" class="text-right">
		<label for="pro_prix">Prix</label>
		<input id="pro_prix" name="pro_prix" type="text" class="form-control" disabled value="<?php echo $fetch->pro_prix; ?>">		
	</div>
<!-- stock -->		
	<div class="form-group col-xs-6">
		<label for="pro_stock">Stock</label>
		<input id="pro_stock" name="pro_stock" type="text" class="form-control" disabled value="<?php echo $fetch->pro_stock; ?>">
	</div>
<!-- couleur -->
	<div class="form-group col-xs-6">
		<label for="pro_couleur">Couleur</label>
		<input id="pro_couleur" name="pro_couleur" type="text" class="form-control" disabled value="<?php echo $fetch->pro_couleur; ?>">
	</div>

<!-- bloque -->
	<div class="form-row">
		<div class="form-group col-l-6">
		<?php 
			if ($fetch->pro_bloque == 1) 
			{ ?>
				<label for="bloque1">Bloqué :  oui</label>
					<input id="bloque1" name="pro_bloque" type="radio" value="1" checked>$produit
				<label>non</label>
					<input name="pro_bloque" type="radio" value="0">
					<?php 
			} else 
			{ ?>
				<label for="bloque2">Bloqué :  oui</label>
					<input id="bloque2" name="pro_bloque" type="radio" value="1">	
				<label>non</label>
					<input name="pro_bloque" type="radio" value="0" checked>
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
    //pas obligatoire de l'utiliser, mais par mesure de sécurité en cas de changement de gestionnaire de BDD, il est préférable de le mettre

include ('footer.php');
?>	
</body>
</html>