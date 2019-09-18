<?php 
include ('header1headSession.php'); ?>
	<link rel="stylesheet" href="../assets/css/login.css">
	<title>confirmation inscription</title>
	<?php
include ('header2bodyImg.php');
?>

	<h1 class="text-center">Bienvenue <?php echo$_SESSION['login']?></h1>
	<div class="post-it">  <!-- pour appliquer css --> 
		<div class="container-fluid text-center">
<!-- login utilisé -->
    		<h4>votre inscription est validée</h4><br><br>
<!-- retour -->
    		<a href="../index.php"><input name="button1" type="button" class="btn btn-info" value="Accès aux pages membres"></a>
    	</div>
	</div>

<?php
include ('footer.php'); ?>
</body>
</html>