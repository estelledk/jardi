<?php 
include('header1headSession.php'); ?>
	<title>produits</title>
	<link rel="stylesheet" href="assets/css/msg.css"> <?php

// include ('header2bodyImg.php');
include('header3Navbar.php');

include('../controler/ctrlProductCreate.php');  //inclut connexion bdd
include('../model/modCategorieList.php'); //requêtes du formulaire, include noté après include de la connexion bdd
?>


<div class="bgcss">

	<br><br><br> <?php 
	if(isset($_POST['submit']) && count($formError) == 0 )   //si POST présent et pas d'erreurs, msg de confirmation de création
	{ ?>
		<div class="post-itcss">  
			<div class="container-fluid text-center">
				<h4>Le produit a été ajouté</h4><br><br>
				<a href="products.php" title="Retour à la liste de produits" class="btn btn-info">Retour à la liste de produits</a><br><br>
			</div>
		</div> <?php
	} 
	else //sinon affichage formulaire
	{ ?>
		<form action="" method="post" enctype="multipart/form-data"><br><br>		<!-- action -->
			
			<div class="container row offset-3 text-center ">   <!-- h1 -->
				<h1 class="text-info">Nouveau produit</h1>
			</div><br><br>
			
			<div class="container row offset-2"> 
				<div class="col-lg-6 col-xs-12">			               
					<img id="img" src=""/><br>					<!-- photo --> 	
				
					<input name="file" id="file" type="file" class="btn btn-outline-info" size="60"><br>Au format : .gif, .jpg, .jpeg, .pjpeg, .png
						<span class="error" id="errorFile"><?php echo isset($formError['file']) ? $formError['file'] : '' ?></span>
						<br><br>  <!-- fichier js en lien avec l'affichage de la photo -->
						
					<label for="color">Couleur</label>			<!-- couleur -->
						<input id="color" name="color" type="text" class="form-control col-lg-11" value="<?php echo isset($_POST['color']) ? $_POST['color'] : '' ?>" required>
						<span class="error" id="errorColor"><?php echo isset($formError['color']) ? $formError['color'] : '' ?></span><br><br>
				</div>    
				
				<div class="col-lg-6 col-xs-12">			
					<label for="ref">Référence</label>			<!-- reference -->
						<input id="ref" name="ref" type="text" class="form-control" value="<?php echo isset($_POST['ref']) ? $_POST['ref'] : '' ?>" required> <!-- récupération de la valeur postée -->
						<span class="error" id="errorRef"><?php echo isset($formError['ref']) ? $formError['ref'] : '' ?></span><br><br>

					<label for="categories">Catégorie</label>	<!-- categorie -->
						<select id="categories" name="categories" class="form-control"> <!--liste déroulante--> <?php
								while ($row = $requete->fetch(PDO::FETCH_OBJ)) 
								{ ?>  <!-- chercher lignes dans la table pour les stocker dans un tabl d'objets(fetch...) -->
									<option value="<?php echo $row->cat_id ?>"><?php echo $row->cat_nom ?></option> <?php 
								} ?>
						</select>
						<span class="error" id="errorCAt"><?php echo isset($formError['categories']) ? $formError['categories'] : '' ?></span><br><br>
						
					<label for="label">Libellé</label>			<!-- libelle -->
						<input id="label" name="label" type="text" class="form-control" value="<?php echo isset($_POST['label']) ? $_POST['label'] : '' ?>" required> 
						<!-- disabled value="<php echo set_value('pro_libelle') != NULL ? set_value('pro_libelle') : $produits->pro_libelle ?>"> -->
						<span class="error" id="errorLabel"><?php echo isset($formError['label']) ? $formError['label'] : '' ?></span><br><br>
								
					<label for="price">Prix</label>				<!-- prix -->
						<input id="price" name="price" type="text" class="form-control" value="<?php echo isset($_POST['price']) ? $_POST['price'] : '' ?>" required>		
						<span class="error" id="errorPrice"><?php echo isset($formError['price']) ? $formError['price'] : '' ?></span><br><br>
																
					<label for="stock">Stock</label>			<!-- stock -->
						<input id="stock" name="stock" type="text" class="form-control" value="<?php echo isset($_POST['stock']) ? $_POST['stock'] : '' ?>" required>
						<span class="error" id="errorStock"><?php echo isset($formError['stock']) ? $formError['stock'] : '' ?></span><br><br>
						
					<label for="bloque1">Bloqué </label>		<!-- bloque -->					
							<input id="bloque1" name="radio2" type="radio" value="1" checked> <!-- value déterminée pour la BDD -->
							<span>Oui</span>
						<label for="bloque2"></label>
							<input id="bloque2" name="radio2" type="radio" value="2">  <!-- value déterminée pour la BDD -->
							<span>Non</span><br>
				</div><br><br>
			</div><br>

			<div class="container row offset-2">				<!-- description -->			
				<div class="col-lg-12">
					<label for="description">Description</label> 	
						<textarea id="description" name="description" class="form-control" cols="150" rows=auto value="<?php echo isset($_POST['description']) ? $_POST['description'] : '' ?>" required></textarea><br>
						<span class="error" id="errorDesc"><?php echo isset($formError['description']) ? $formError['description'] : '' ?></span><br>
				</div>	
			</div><br>	

			<div class="container row offset-2">				<!-- submit -->
				<div class="col-lg-12">
					<input name="submit" type="submit" class="btn btn-info btn-lg text-center" value="création du nouveau produit">
				</div>
			</div>
			
		</form> <br><br>
	
	<?php
	} 
	
	$requete->closeCursor();  //closeCursor() clôt le Fetch()
		//pas obligatoire de l'utiliser. Mais par mesure de sécurité en cas de changement de gestionnaire de BDD, il est préférable de le mettre

	include ('footer.php');
	?>

</div>
<script src="../assets/js/loadImg.js"></script>
</body>
</html>