<?php 
include('header1headSession.php');
include('header3Navbar.php');
?><title>produits</title> <?php

include('../controler/ctrlRecherch.php'); 
?>


<form action="" method="post" enctype="multipart/form-data">
	<div class="bgcss">
		<div class="container"> 

			<div class="form-group col-xs-6">					<!-- ID -->
				<label for="pro_id">ID</label>
				<input id="pro_id" name="pro_id" type="text" class="form-control" disabled value="<?php echo $fetchProd_whereProId->pro_id; ?>" readonly="readonly">
				<!-- readonly="readonly" fige la valeur, pas possiblité de la modifier  -->
				<!-- __l'objet "produit" contient l'ensemble des champs de la ligne que l'on veux afficher. -->
				<!-- __afin d'afficher chaque colonne de notre ligne nous allons utiliser la constrution "objet->nom_de_la_propriété". -->
			</div>
		
			<div class="form-group col-xs-6">					<!-- reference -->	
				<label for="pro_ref">Référence</label>
				<input id="pro_ref" name="pro_ref" type="text" class="form-control" disabled value="<?php echo $fetchProd_whereProId->pro_ref; ?>">
			</div>
						
			<div class="form-group col-xs-6">					<!-- categorie -->
				<label for="pro_cat_id">Catégorie</label>
				<input id="pro_cat_id" name="pro_cat_id" type="text" class="form-control" disabled value="<?php echo $fetchProd_whereProId->pro_cat_id; ?>">
			</div>
	
			<div class="form-group col-xs-6">					<!-- libelle -->	
				<label for="pro_libelle">Libellé</label>
				<input id="pro_libelle" name="pro_libelle" type="text" class="form-control" disabled value="<?php echo $fetchProd_whereProId->pro_libelle; ?>">
			</div>
				
			<div class="form-group col-xs-6">					<!-- description -->
				<label for="pro_description">Description</label>
				<textarea id="pro_description" name="pro_description" class="form-control" disabled cols="150" rows=auto><?php echo $fetchProd_whereProId->pro_description; ?></textarea>
			</div>

			<div class="form-group col-xs-6" class="text-right"><!-- prix -->
				<label for="pro_prix">Prix</label>
				<input id="pro_prix" name="pro_prix" type="text" class="form-control" disabled value="<?php echo $fetchProd_whereProId->pro_prix; ?>">		
			</div>
				
			<div class="form-group col-xs-6">					<!-- stock -->
				<label for="pro_stock">Stock</label>
				<input id="pro_stock" name="pro_stock" type="text" class="form-control" disabled value="<?php echo $fetchProd_whereProId->pro_stock; ?>">
			</div>
		
			<div class="form-group col-xs-6">					<!-- couleur -->
				<label for="pro_couleur">Couleur</label>
				<input id="pro_couleur" name="pro_couleur" type="text" class="form-control" disabled value="<?php echo $fetchProd_whereProId->pro_couleur; ?>">
			</div>

		
			<div class="form-row">								<!-- bloque -->
				<div class="form-group col-l-6" readonly="readonly">
				<?php 
					if ($fetchProd_whereProId->pro_bloque == 1) 
					{ ?>
						<label for="bloque1">Bloqué :  oui</label>
							<input id="bloque1" name="pro_bloque" type="radio" value="1" checked readonly="readonly">
						<label>non</label>
							<input name="pro_bloque" type="radio" value="0" readonly="readonly">
							<?php 
					} else 
					{ ?>
						<label for="bloque2">Bloqué :  oui</label>
							<input id="bloque2" name="pro_bloque" type="radio" value="1" readonly="readonly">	
						<label>non</label>
							<input name="pro_bloque" type="radio" value="0" checked readonly="readonly">
							<?php 
					} ?>
				</div>
			</div>
		
			<span name="pro_d_ajout" class="form-control" readonly="readonly">	<!-- date d ajout -->	
				<?php echo "Date d'ajout : " .$fetchProd_whereProId->pro_d_ajout; ?>
			</span><br>
			
			<span name="pro_d_modif" class="form-control" readonly="readonly">	<!-- date modif -->		
				<?php echo "Date de modification : " .$fetchProd_whereProId->pro_d_modif; ?>
			</span><br><br>
			
																			<!-- valider -->	
			<a href="products.php" class="d-flex justify-content-center"><input name="retour" type="button" class="btn btn-info" value="retour à la liste de produits"></a>
						<!-- class="d-flex justify-content-center"> : pour centrer -->
		
		</div>				
	</div><br><br><br>
</form>

<?php 
$resultProd_whereProId->closeCursor();  //closeCursor() clôt le Fetch()
    //pas obligatoire de l'utiliser, mais par mesure de sécurité en cas de changement de gestionnaire de BDD, il est préférable de le mettre

include('footer.php');
?>	
</body>
</html>