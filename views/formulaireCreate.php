<?php 
include ('header1headSession.php');
?> 
	<link rel="stylesheet" href="../assets/css/login.css">  <!-- nécessaire pour le message de confirmation -->
	<title>Ajout</title>
<?php
include ('header2bodyImg.php');

include ('../controler/ctrlFormCreate.php');  //inclut connexion bdd
include ('../model/modFormCreate.php'); //requêtes du formulaire, include noté après include de la connexion bdd


//msg de confirmation de création
if ( isset($_POST['submit']) && count($formError) == 0 )   //si POST présent et pas d'erreurs
{ ?>
	<h1 class="text-center">Confirmation</h1>
	<div class="post-it">  <!-- pour appliquer css --> 
		<div class="container-fluid text-center">
			<h4>Le produit a été ajouté</h4><br><br>
			<a href="products.php" title="Retour à la liste de produits" class="btn btn-success">Retour à la liste de produits</a>
			<br><br>
		</div>
	</div>
		<?php
} 
else //sinon affichage formulaire
{ ?>


<!-- AFFICHAGE FORMULAIRE -->
	<div class="jumbotron">  <!-- fond grisé -->
	  <div class="container">  <!-- marge à gauche -->
		<!-- <div class="table table-responsive"> -->

<!-- renvoi au script -->
			<form action="#" method="post" enctype="multipart/form-data">  <!-- pas de redirection -->
				<!-- enctype="multipart/form-data" : pour upload fichier -->

<!-- categories -->
				<div class="form-row">  <!-- form-row à chaque ligne -->
					<div class="col-lg-6">  <!-- concerne la 1ère colonne -->
						<label for="categories">Catégorie</label>
						<select id="categories" name="categories" class="form-control"> 
						<!--liste déroulante--> <?php
							while ($row = $requete->fetch(PDO::FETCH_OBJ)) 
							{ ?>  <!-- chercher lignes dans la table pour les stocker dans un tabl d'objets(fetch...) -->
								<option value="<?php echo $row->cat_id ?>"><?php echo $row->cat_nom ?></option>  <?php 
							} ?>
						</select><br>
					</div>
					<div class="col-lg-6">  <!-- concerne la 2ème colonne -->
						<span class="error" id="errorCAt"><?php echo isset($formError['categories']) ? $formError['categories'] : '' ?></span>
					</div>
				</div>
<!-- ref -->
				<div class="form-row">
					<div class="col-lg-6">
						<label for="ref">Référence</label>
						<input id="ref" name="ref" type="text" class="form-control"
						value="<?php echo isset($_POST['ref']) ? $_POST['ref'] : '' ?>" required> <!-- récupération de la valeur postée -->
					</div>
					<div class="col-lg-6"><br>
						<span class="error" id="errorRef"><?php echo isset($formError['ref']) ? $formError['ref'] : '' ?></span>
					</div>
				</div><br>
<!-- label -->
				<div class="form-row">
					<div class="col-lg-6">
						<label for="label">Libellé</label>
						<input id="label" name="label" type="text" class="form-control"
						value="<?php echo isset($_POST['label']) ? $_POST['label'] : '' ?>" required> 
					</div>
					<div class="col-lg-6"><br>
						<span class="error" id="errorLabel"><?php echo isset($formError['label']) ? $formError['label'] : '' ?></span>
					</div>
				</div><br>
<!-- description -->
				<div class="form-row">
					<div class="col-lg-6">
						<label for="description">Description</label>
						<textarea id="description" name="description" class="form-control" cols="150" rows=auto
						value="<?php echo isset($_POST['description']) ? $_POST['description'] : '' ?>" required></textarea>
					</div>
					<div class="col-lg-6"><br>
						<span class="error" id="errorDesc"><?php echo isset($formError['description']) ? $formError['description'] : '' ?></span>
					</div>
				</div><br>
<!-- price -->
				<div class="form-row">
					<div class="col-lg-6">
						<label for="price">Prix</label>
						<input id="price" name="price" type="text" class="form-control"
						value="<?php echo isset($_POST['price']) ? $_POST['price'] : '' ?>" required> 
					</div>
					<div class="col-lg-6"><br>
						<span class="error" id="errorPrice"><?php echo isset($formError['price']) ? $formError['price'] : '' ?></span>
					</div>
				</div><br>
<!-- stock -->
				<div class="form-row">
					<div class="col-lg-6">
						<label for="stock">Stock</label>
						<input id="stock" name="stock" type="text" class="form-control"
						value="<?php echo isset($_POST['stock']) ? $_POST['stock'] : '' ?>" required> 
					</div>			
					<div class="col-lg-6"><br>
						<span class="error" id="errorStock"><?php echo isset($formError['stock']) ? $formError['stock'] : '' ?></span>
					</div>
				</div><br>
<!-- color -->
				<div class="form-row">
					<div class="col-lg-6">
						<label for="color">Couleur</label>
						<input id="color" name="color" type="text" class="form-control"
						value="<?php echo isset($_POST['color']) ? $_POST['color'] : '' ?>" required> 
					</div>
					<div class="col-lg-6"><br>
						<span class="error" id="errorColor"><?php echo isset($formError['color']) ? $formError['color'] : '' ?></span>
					</div>
				</div><br>
<!-- bloque -->
				<div class="form-row">
					<div class="col-lg-6">
						<label for="bloque1"> Bloqué : oui</label>
						<input id="bloque1" name="radio2" type="radio" value="1" checked> <!-- value déterminée pour la BDD -->

						<label for="bloque2">non</label>
						<input id="bloque2" name="radio2" type="radio" value="2"> <!-- value déterminée pour la BDD -->
					</div>
				</div><br>
<!-- photo/file -->
				<div class="form-row">
					<div class="col-lg-6">
						<input name="file" type="file" class="btn btn-secondary" size="30"><br>Au format : .gif, .jpg, .jpeg, .pjpeg ou .png
						<!-- type="file" : insertion d'un file -->
					</div>
					<div class="col-lg-6"><br>
						<span class="error" id="errorFile"><?php echo isset($formError['file']) ? $formError['file'] : '' ?></span>
					</div>
				</div><br><br>
<!-- submit -->
				<div class="form-row">
					<div class="col-lg-6">
						<input name="submit" type="submit" class="btn btn-info btn-lg text-center" value="création du nouveau produit">
						<!-- btn-info : couleur vert d'eau ; btn-lg : bouton large -->
						<br>
					</div>
				</div>
			</form>
        <!-- </div> -->
  	  </div>
	</div>

<?php
}
$requete->closeCursor();

include ('footer.php');
?>
</body>
</html>