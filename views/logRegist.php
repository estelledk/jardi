<?php 
include('header1headSession.php');
include('header3Navbar.php');
?><link rel="stylesheet" href="../assets/css/msg.css">
	<title>inscription</title><?php
include('../controler/ctrlLogRegist.php');  //include le controler pour ne pas faire de redirection et laisser les champs affichés


if (isset($_POST['submit']) )  //si présence submit 	<!-- msg erreur (en bandeau) --> 
{ 
	if (isset($formError['same'])) { ?> <!-- si erreur d'identification -->
		<div class="alert alert-danger pt-2" role="alert"><br>
			<div class="container-fluid text-right">
				<h4><?= $formError['same'] ?></h4><br>
			</div>
		</div> <?php
	} 
	else if (isset($formError['login'])) { ?> <!-- si erreur d'identification -->
		<div class="alert alert-danger pt-2" role="alert"><br>
			<div class="container-fluid text-right">
				<h4><?= $formError['login'] ?></h4><br>
			</div>
		</div> <?php
	} 
	else if (isset($formError['pwd'])) { ?> <!-- si erreur d'identification -->
		<div class="alert alert-danger pt-2" role="alert"><br>
		<div class="container-fluid text-right">
			<h4><?= $formError['pwd'] ?></h4><br>
		</div>
		</div> <?php
	} 
	else { ?>
		<div class="container-fluid text-center post-itcss h4Post-itcss col-lg-3 col-xs-12 pb-5">	
			<h4 class="text-info pt-2 pb-5">Vos identifiants ont été enregistrés</h4>
			<!-- retour -->
			<a href="products.php" class="btn btn-info" title="Lien vers la liste des produits">Liste de produits</a><br><br>
		</div> <?php
	}			
} 
?>

	<h2 class="text-center text-info h2Post-itcss">Inscription</h2>

	<form action="#" method="post">
		<div class="container-fluid text-center post-itcss col-lg-3 col-xs-12 pb-5"> 
			<label for="login">Votre login :</label> 
			<input id="login" name="login" type="text" value="<?php echo isset($_POST['login']) ? $_POST['login'] : '' ?>" required> <!-- récupération de la valeur postée --><br>
			<span id="errorLogin" class="pt-2 pb-3"><?php echo isset($formError['login']) ? $formError['login'] : '' ?></span><br>
			
			<label for="pwd">Votre mot de passe ( - _ ! * acceptés)</label> 				<!-- password -->
			<input id="pwd" name="pwd" type="password" value="<?php echo isset($_POST['pwd']) ? $_POST['pwd'] : '' ?>" required> <!-- récupération de la valeur postée --><br>
			<span id="errorPwd" class="pt-2 pb-5"><?php echo isset($formError['pwd']) ? $formError['pwd'] : '' ?></span><br>	
			<br>

			<!-- <div class="form-row">							 mail 
				<div class="col-lg-11"> -->
					<!-- Votre email : <input name="email" type="email"><br><br> -->
				<!-- </div>
				<div class="col-lg-1">
					<span id="pwdBis"></span><br>
					<p><= isset($formError['email']) ? $formError['email'] : '' ?></p>
				</div>
			</div> -->

			<input name="submit" type="submit" value="Création du compte" class="btn btn-info">

			<h4><a href="login.php" class="d-flex justify-content-end text-warning pt-5">Déjà membre ?</a></h4>		<!-- lien login -->
				<!-- class="d-flex justify-content-end"  pour aligner à droite -->
		</div>
	</form>

<?php
include('footer.php'); ?>

<script src="../assets/js/ctrlLogRegistJQ.js"></script>  <!-- validation côté client -->

</body>
</html>		