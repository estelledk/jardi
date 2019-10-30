<?php 
include('header1headSession.php');
include('header3Navbar.php');
?><title>formulaire</title><?php

include('../controler/ctrlFormClient.php');   //validation côté serveur



if (isset($_POST['submit']) && count($formError) === 0)  //s'il y a présence(=isset) du POST submit et pas d'erreurs 
{ ?>
	<br><br><br>
	<div class="row justify-content-center bg-info text-light">  <!-- barre vert d'eau pour afficher msg -->
		<div class="col-xs-1">
			<div class="container-fluid text-center">
				<br>
				<h4>Il n'y a pas d'erreurs, votre formulaire a été pris en compte</h4><br>
				<a href="../index.php"><input name="button" type="button" class="btn btn-secondary" value="Retour à l'accueil"></a>
				<br><br>
			</div>
		</div>
	</div>
	<?php		

} else  //on affiche le formulaire
{ ?>



	<div class="bgcss">
		<form action="#" method="post" enctype="multipart/form-data">  <!-- action="#" : pas de redirection, ce sera affiché en haut du questionnaire -->
			<div class="container">
				<div class="text-center text-info"><br><br>
					<h2>FORMULAIRE A COMPLETER</h2><br><br>
				</div>
				
			
				<h5>Vos coordonnées</h5>
				<div class="form-row">  <!-- class="row" permet de classer ligne composée de 12 col ; avec class="form-row" les col peuvent se mettre en ligne si page étroite -->
					<div class="col-lg-4 col-xs-12">  					<!-- nom -->
						<label for="nom"> nom</label>									
						<input id="nom" name="nom" type="text" class="form-control champ" 
						value="<?php echo isset($_POST['nom']) ? $_POST['nom'] : '' ?>" required> <!-- récupération de la valeur postée -->
							<!-- TERNAIRE : si la valeur de nom est pésente(isset...) alors(?) on récupère la valeur du nom postée($_POST['nom'] sinon(:) on n'affiche rien ('') -->
						<p><?php echo isset($formError['nom']) ? $formError['nom'] : '' ?></p>  <!-- affichage du message de validation ou d'erreur -->
					</div>
					<div class="col-lg-1"><br><br>								<!-- validation/client du nom -->
						<span id="nomBis"></span><br>	
					</div>
				
					<div class="col-lg-3 col-xs-12">						<!-- prenom -->	
						<label for="prenom">prénom</label>
						<input id="prenom" name="prenom" type="text" class="form-control champ" value="<?php echo isset($_POST['prenom']) ? $_POST['prenom'] : '' ?>" required> 
						<p><?php echo isset($formError['prenom']) ? $formError['prenom'] : '' ?></p>
					</div>
					<div class="col-lg-1"><br><br>
						<span id="prenomBis"></span><br>
					</div>
			
					<div class="col-lg-2 col-xs-12">						<!-- naissance -->	
						<label for="naissance"> date de naissance</label>
						<input id="naissance" name="naissance" name="naissance" class="form-control champ" value="<?php echo isset($_POST['naissance']) ? $_POST['naissance'] : '' ?>" required> 
						<p><?php echo isset($formError['naissance']) ? $formError['naissance'] : '' ?></p>
					</div>
					<div class="col-lg-1"><br><br>
						<span id="naissanceBis"></span><br>
					</div>
				</div><br><br>	
						

				<div class="form-row">  <!-- nouvelle "form-row" // nouvelle ligne -->
					<div class="col-lg-4">									<!-- adresse --> 
						<label for="adresse"> adresse</label>
						<textarea id="adresse" name="adresse" class="form-control" rows="3" value="<?php echo isset($_POST['adresse']) ? $_POST['adresse'] : '' ?>" required></textarea> 
						<!-- textarea pour écrire sur plusieurs lignes -->
						<p><?php echo isset($formError['adresse']) ? $formError['adresse'] : '' ?></p>
					</div>
					<div class="col-lg-1"><br><br>
						<span id="adresseBis"></span><br>
					</div>
			
					<div class="col-lg-3">										<!-- ville -->	
						<label for="ville"> ville</label>
						<input id="ville" name="ville" type="text" class="form-control" value="<?php echo isset($_POST['ville']) ? $_POST['ville'] : '' ?>" required> 
						<p><?php echo isset($formError['ville']) ? $formError['ville'] : '' ?></p>  
					</div>
					<div class="col-lg-1"><br><br>
						<span id="villeBis"></span><br>
					</div>
			
					<div class="col-lg-2">										<!-- postal -->	
						<label for="postal"> code postal</label>
						<input id="postal" name="postal" type="text" class="form-control" value="<?php echo isset($_POST['postal']) ? $_POST['postal'] : '' ?>" required> 
						<p><?php echo isset($formError['postal']) ? $formError['postal'] : '' ?></p>
					</div>
					<div class="col-lg-1"><br><br>
						<span id="postalBis"></span><br>
					</div>
				</div><br><br>
				

				<div class="form-row">
					<div class="col-lg-11">										<!-- email -->	
						<label for="email"></label> e-mail</label>
						<input id="email" name="email" type="email" class="form-control" size="30" placeholder="ex : blablabla@gmail.com" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>" required> 
						<p><?php echo isset($formError['email']) ? $formError['email'] : '' ?></p>
						<!-- type="email" -->
						<!-- placeholder pour écrire en grisé -->
					</div>
					<div class="col-lg-1"><br><br>
						<span id="emailBis"></span><br>
					</div>
				</div><br><br>  

				
				<h5>Le jardinage</h5>
				<div class="form-row">
					<div class="col-lg-3">										<!-- jardin -->	
						<label for="jardin">Vous avez : un jardin </label>
						<input id="jardin" name="jardinage" type="radio" value="jardin" checked>  <!-- checked : coché -->
					</div>
					<div class="col-lg-2">
						<label for="balcon">	un balcon </label>
						<input id="balcon" name="jardinage" type="radio" value="balcon">
					</div>
				</div><br><br>	  
			
				<div class="form-row">	
					<div class="col-lg-4">										<!-- frequence -->
						Vous jardinez... 
						<select id="frequence" name="frequence" class="form-control" value="<?php echo isset($_POST['frequence']) ? $_POST['frequence'] : '' ?>" required> 
						<p><?php echo isset($formError['frequence']) ? $formError['frequence'] : '' ?></p>
							<option value="" selected>choisissez</option>
							<!-- <select> menu déroulant -->
							<!-- required : requis -->
							<!-- selected : valeur affichée par défaut -->
							<option value="une fois par semaine">une fois par semaine</option>
							<option value="quotidiennement">quotidiennement</option>
							<option value="autre">autre</option>
						</select><br>
					</div>
					<div class="col-lg-1">
						<span id="frequenceBis"></span>
					</div>
			
					<div class="col-lg-6">										<!-- autre -->
						<label for="autre">si vous avez répondu "autre", précisez </label>
						<textarea id="autre" name="autre" class="form-control" rows="3" cols="77" value="<?php echo isset($_POST['autre']) ? $_POST['autre'] : '' ?>"></textarea>
					</div>
					<div class="col-lg-1">
						<span id="autreBis"></span>
					</div>
				</div><br><br>
						
				<div class="form-row">
					<div class="col-lg-11">										<!-- commentaire -->
						<textarea id="commentaire" name="commentaire" class="form-control" rows="5" cols="100" placeholder="vos commentaires" value="<?php echo isset($_POST['commentaire']) ? $_POST['commentaire'] : '' ?>"></textarea>
					</div>
					<div class="col-lg-1">
						<span id="commentaireBis"></span>
					</div>
				</div><br>
						
				<div class="form-row">
					<div class="col-lg-4">										<!-- jour -->	
					<!-- Dans action="ctrlFormClient.php",  $_POST["Fjour]" contiendra un tableau dont il faudra lire les valeurs à l'aide d'une boucle -->
						<label id="jour">Vous jardinez plutôt le : </label><br>
							<input type="checkbox" name="Fjour[]" value="lundi"> Lundi<br>
							<input type="checkbox" name="Fjour[]" value="mardi"> Mardi<br>
							<input type="checkbox" name="Fjour[]" value="mercredi"> Mercredi<br>
							<input type="checkbox" name="Fjour[]" value="jeudi"> Jeudi<br />
							<input type="checkbox" name="Fjour[]" value="vendredi"> Vendredi<br>
							<input type="checkbox" name="Fjour[]" value="samedi"> Samedi<br />
							<input type="checkbox" name="Fjour[]" value="dimanche"> Dimanche<br>
							<span value="<?php echo isset($_POST['jour']) ? $_POST['jour'] : '' ?>"></span>
					</div>
					<div class="col-lg-1">
						<span id="jourBis"></span>
					</div>
				</div><br><br>

				<div class="text-center">	
					<div>
																		<!-- bouton envoyer -->
						<input id="envoyer" name="submit" type="submit" class="btn btn-info btn-lg" value="envoyer les données">
						<!-- type="submit" pour envoyer le formulaire -->
																		<!-- bouton effacer -->		
						<input id="effacer" name="effacer" type="reset" class="btn btn-outline-secondary" value="effacer">
						<!-- type="reset" pour effacer le formulaire -->
					</div>	 
				</div><br><br>

				<div class="container-fluid">  <!-- class="container-fluid" : marge à gauche-->
					<br>
					<h5><a href="mailto/estelle.fentza@gmail.com?subject=complément d'informations">Ecrivez-nous pour tout complément d'informations</a></h5>
					<br><br>
			</div>	
		</form>	
	</div>  <!-- fermeture div jumbotron -->

<?php 
} 
include('footer.php'); ?>
<script src="../assets/js/ctrlFormClientJQ.js"></script>  <!-- validation côté client -->


</body>
</html>