<?php 
include ('header1headSession.php'); ?>
	<link rel="stylesheet" href="../assets/css/login.css">
	<title>identification</title>
	<?php
include ('header2bodyImg.php');

include ('../controler/ctrlLogin.php');  //include le controler pour ne pas faire de redirection et laisser les champs affichés
?>


<!-- msg erreur --> 
<?php
if (isset($_POST['submit']) )  //si présence submit 
{ ?>
	<br>
	<div class="row justify-content-end bg-secondary text-light">  <!-- pour appliquer css lié à form -->
		<div class="col-xs-1">
		<?php
			if ($connexionError['pwd'] = 'erreur d\'identifiant') //si erreur d'identification
			{ ?>
				<div class="container-fluid text-center">
					<h4>Identifiants inconnus</h4><br>
				</div>
				<?php
			} ?>
		</div>
	</div>
<?php				
}
?>


	<h1 class="text-center">Connexion membre</h1>
	
<!-- ACTION -->
	<form action="#" method="post">
		<div id="postit" class="container-fluid text-center"> 

<!-- login -->
			<input id="login" name="login" type="text" class="text-center" placeholder="login" value="<?php echo isset($_POST['login']) ? $_POST['login'] : '' ?>" required> <!-- récupération de la valeur postée -->
			<br><br>
<!-- password -->
			<input id="pwd" name="pwd" type="password" class="text-center" placeholder="mot de passe" value="<?php echo isset($_POST['pwd']) ? $_POST['pwd'] : '' ?>" required> <!-- récupération de la valeur postée -->
			<br><br>
<!-- enregistrer -->
    		<input name="submit" type="submit" value="Connexion" class="btn btn-success"><br><br>
<!-- lien inscription -->
    		<br>
    		<h5><a href="logRegist.php" class="d-flex justify-content-end">inscription</a></h5>
    			<!-- class="d-flex justify-content-end" : pour aligner à droite -->    	
    	</div> 
	</form>

<br>

<?php
include ('footer.php'); 
?>
</body>
</html>