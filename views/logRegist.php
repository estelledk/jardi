<?php 
include ('header1headSession.php'); ?>
	<link rel="stylesheet" href="../assets/css/login.css">
	<title>inscription</title>
	<?php
include ('header2bodyImg.php');

include ('../controler/ctrlLogRegist.php');  //include le controler pour ne pas faire de redirection et laisser les champs affichés
?>


<!-- msg erreur (en bandeau) --> 
<?php
if (isset($_POST['submit']) )  //si présence submit 
{ ?>
	<br>
	<div class='row justify-content-end bg-secondary text-light'> 
		<div class="col-xs-1"> <?php
			if ($connexionError['Same'] = 'Identifiant déjà utilisé') //si erreur d'identification
			{ ?>
				<div class="container-fluid text-center">
					<h4>Identifiants déjà utilisés</h4><br>
				</div> <?php
			} ?>
		</div>
	</div>
<!-- -->
	<?php				
} ?>


	<h1 class="text-center">Inscription</h1>

<!-- ACTION -->
	<form action="#" method="post">
		<div class="container-fluid text-center">
			<div class="form-row"> 
				<div class="col-lg-11">
<!-- login -->		<label for="login">Votre login :</label> 
					<input id="login" name="login" type="text" value="<?php echo isset($_POST['login']) ? $_POST['login'] : '' ?>" required> <!-- récupération de la valeur postée -->
					<br><br>
				</div>

				<div class="col-lg-1">
					<span id="loginBis"></span><br>
					<p><?php echo isset($formError['login']) ? $formError['login'] : '' ?></p>
				</div>
			</div>

			<div class="form-row"> 
				<div class="col-lg-11">
<!-- password -->	<label for="pwd">Votre mot de passe (avec -_!* acceptés)  :</label> 
					<input id="pwd" name="pwd" type="password" value="<?php echo isset($_POST['pwd']) ? $_POST['pwd'] : '' ?>" required> <!-- récupération de la valeur postée -->
					<br><br>
				</div>

				<div class="col-lg-1">
					<span id="pwdBis"></span><br>
					<p><?php echo isset($formError['pwd']) ? $formError['pwd'] : '' ?></p>
				</div>
			</div>

<!-- mail -->
			<!-- <div class="form-row"> 
				<div class="col-lg-11"> -->
    		<!-- Votre email : <input name="email" type="email"><br><br> -->
				<!-- </div>
				<div class="col-lg-1">
					<span id="pwdBis"></span><br>
					<p><= isset($formError['email']) ? $formError['email'] : '' ?></p>
				</div>
			</div> -->

<!-- enregistrer -->
			<div class="form-row"> 
				<div class="col-lg-11">
    				<input name="submit" type="submit" value="Création du compte" class="btn btn-success"><br><br>
				</div>
			</div>

<!-- lien login -->
    		<br>
    		<h5><a href="login.php" class="d-flex justify-content-end">déjà membre ?</a></h5>
    			<!-- class="d-flex justify-content-end"  pour aligner à droite -->

    	</div> 
	</form>

<?php
include ('footer.php'); ?>
<script src="../assets/js/ctrlLogRegistJQ.js"></script>  <!-- validation côté client -->
</body>
</html>		