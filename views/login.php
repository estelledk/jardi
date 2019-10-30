<?php 
include('header1headSession.php'); 
include('header3Navbar.php');
?><link rel="stylesheet" href="../assets/css/msg.css">
	<title>identification</title><?php

include('../controler/ctrlLogin.php');  //include le controler pour ne pas faire de redirection et laisser les champs affichés
?>

<!-- msg erreur --> 
<?php
if (isset($_POST['submit'])) { //si présence submit 
	if (isset($connexionError['login'])) //si erreur d'identification
	{ ?>
		<div class="alert alert-danger pt-2" role="alert"><br>
			<div class="container-fluid text-right">
				<h4><?= $connexionError['login'] ?></h4><br>
			</div>
		</div> <?php
	} 
	else if (isset($connexionError['pwd'])) //si erreur d'identification
	{ ?>
		<div class="alert alert-danger pt-2" role="alert"><br>
			<div class="container-fluid text-right">
				<h4><?= $connexionError['pwd'] ?></h4><br>
			</div>
		</div> <?php
	} 
	else 
	{ ?>
		<div class="container-fluid text-center post-itcss h4Post-itcss col-lg-3 col-xs-12 pb-5">	
			<h4 class="text-info pt-2 pb-5">Bienvenue</h4>
			<a href="products.php" class="btn btn-info" title="Lien vers la liste des produits">Liste des produits</a><br><br><br>
		</div><?php
	}			
} ?>

	<h2 class="text-center text-info h2Post-itcss pt-1">Connexion membre</h2>
	
	<form action="#" method="POST">	
		<div class="container-fluid text-center post-itcss col-lg-3 col-xs-12"><br>
				<input id="log" name="login" type="text" class="text-center" placeholder="login" value="<?php echo isset($_POST['login']) ? $_POST['login'] : '' ?>" required> <!-- récupération de la valeur postée --><br>
				<span id="errorLog" class="pt-2 pb-3"><?php echo isset($formError['login']) ? $formError['login'] : '' ?></span><br><br>
				
				<input id="pwd" name="pwd" type="password" class="text-center" placeholder="mot de passe" value="<?php echo isset($_POST['pwd']) ? $_POST['pwd'] : '' ?>" required> <!-- récupération de la valeur postée --><br>
				<span id="errorPwd" class="pt-2 pb-5"><?php echo isset($formError['pwd']) ? $formError['pwd'] : '' ?></span><br><br>	
				
				<input name="submit" type="submit" value="Connexion" class="btn btn-info"><br><br>
				<br>
				<h4><a href="logRegist.php" class="text-warning d-flex justify-content-end">Inscription ?</a></h4><!-- class="d-flex justify-content-end" : pour aligner à droite -->		  	
    	</div><br>
	</form>
<br>

<?php
include('footer.php'); 
?>
<script src="../assets/js/ctrlLogRegistJQ.js"></script>  <!-- validation côté client -->

</body>
</html>