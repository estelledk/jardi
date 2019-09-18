<?php 
include ('header1headSession.php'); ?> 
<title>produits</title>
<?php
include ('header2bodyImg.php');

include ('../controler/ctrlFormUpdate.php');  //inclut connexion bdd
include ('../model/modFormUpdate.php'); //requêtes du formulaire, include noté après include de la connexion bdd
?>


<!-- renvoi au script -->
<form action="" method="POST" enctype="multipart/form-data">

<div class="jumbotron">  <!-- fond grisé -->
<div class="container">  <!-- marge à gauche -->
<div class="col-6">

<!-- ID -->
	<div class="form-group col-xs-6">
		<label for="pro_id">ID</label>
		<input id="pro_id" name="pro_id" type="text" class="form-control" value="<?php echo $fetchProd->pro_id; ?>" readonly="readonly">
			<!-- readonly="readonly" : fige la valeur, pas possiblité de la modifier -->
	</div>
<!-- ref -->
	<div class="form-group col-xs-6">
		<label for="ref">Référence</label>
		<input id="ref" name="ref" type="text" class="form-control" value="<?php echo isset($_POST['ref']) ? $_POST['ref'] : $fetchProd->pro_ref ?>">
		<span id="errorRef" class="error"><?php echo isset($formError['ref']) ? $formError['ref'] : '' ?></span>
	</div>
<!-- categories -->
	<div class="form-group col-xs-6">
        <label for="categories">Catégorie</label>
	<!--liste déroulante-->	
		<select id="categories" name="categories" class="form-control">  
        <?php
            while ($fetchCat = $reponseCat->fetch(PDO::FETCH_OBJ)) 
            { ?>
				<option value="<?php echo $fetchCat->cat_id ?>"<?php echo isset($_POST['categories']) && $_POST['categories'] == $fetchCat->cat_id || $fetchCat->cat_id == $fetchProd->pro_cat_id  ? 'selected' : '' ?>><?php echo $fetchCat->cat_nom ?></option>
		<?php
			} ?>
        </select>
	 </div>
<!-- label -->
	<div class="form-group col-xs-6">
		<label for="label">Libellé</label>
		<input id="label" name="label" type="text" class="form-control" value="<?php echo isset($_POST['label']) ? $_POST['label'] : $fetchProd->pro_libelle ?>">
		<span id="errorLabel" class="error"><?php echo isset($formError['label']) ? $formError['label'] : '' ?></span>
	</div>
<!-- description -->
	<div class="form-group col-xs-6">
		<label for="description">Description</label>
		<textarea id="description" name="description" class="form-control" cols="150" rows=auto><?php echo isset($_POST['decription']) ? $_POST['description'] : $fetchProd->pro_description ?></textarea>
		<span id="errorDesc" class="error"><?php echo isset($formError['description']) ? $formError['description'] : '' ?></span>
	</div>
<!-- price -->
	<div class="form-group col-xs-6" class="text-right">
		<label for="price">Prix au format .00</label>
		<input id="price" name="price" type="text" class="form-control" value="<?php echo isset($_POST['price']) ? $_POST['price'] : $fetchProd->pro_prix ?>">
		<span id="errorPrice" class="error"><?php echo isset($formError['price']) ? $formError['price'] : '' ?></span>
	</div>
<!-- stock -->
	<div class="form-group col-xs-6">
		<label for="stock">Stock</label>
		<input id="stock" name="stock" type="text" class="form-control" value="<?php echo isset($_POST['stock']) ? $_POST['stock'] : $fetchProd->pro_stock ?>">
		<span id="errorStock" class="error"><?php echo isset($formError['stock']) ? $formError['stock'] : '' ?></span>
	</div>
<!-- color -->
	<div class="form-group col-xs-6">
		<label for="color">Couleur</label>
		<input id="color" name="color" type="text" class="form-control" value="<?php echo isset($_POST['color']) ? $_POST['color'] : $fetchProd->pro_couleur ?>">
		<span id="errorColor" class="error"><?php echo isset($formError['color']) ? $formError['color'] : '' ?></span>
	</div>
<!-- photo/file -->
	<div class="form-group col-xs-6">
		<label for="file">Photo, au format : .gif, .jpg, .jpeg, .pjpeg ou .png</label><br>
		<input id="file" name="file" type="file" class="btn btn-secondary" size="30">
	</div><br>

<!-- radio/bloque -->
	<div class="form-row">
		<div class="form-group col-l-6">
				<label>Bloqué :  oui</label>
				<input name="radio2" type="radio" value="1">

				<label>non</label>
				<input name="radio2" type="radio" value="2" checked>
		 </div>
	</div>

<!-- dateAjout -->
	<div class="form-group col-xs-6">
		<label for="dateAjout">Date d'ajout</label>
		<input id="dateAjout" name="dateAjout" type="text" class="form-control" value="<?php echo $fetchProd->pro_d_ajout; ?>" readonly="readonly">
		<span id="errorDateAjout" class="error"><?php echo isset($formError['dateAjout']) ? $formError['dateAjout'] : '' ?></span>
	</div>
<!-- dateModif -->
	<div class="form-group col-xs-6">
		<label for="dateModif">Date de modif</label>
		<input id="dateModif" name="dateModif" type="text" class="form-control" value="<?php echo isset($_POST['dateModif']) ? $_POST['dateModif'] : $fetchProd->pro_d_modif ?>">
		<span id="errorDateModif" class="error"><?php echo isset($formError['dateModif']) ? $formError['dateModif'] : '' ?></span>
	</div>

    <br><br>
<!-- valider -->
    <div class="text-center">
		<input name="submit" type="submit" class="btn btn-info btn-lg" value="modification du produit">
    	<!-- btn-info : couleur vert d'eau   ;   btn-lg : bouton large -->
	</div>

</div>

</form>

<?php
$reponseProd->closeCursor();
$reponseCat->closeCursor();
include ('footer.php');
?>

</body>
</html>