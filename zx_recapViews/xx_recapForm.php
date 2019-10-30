<?php
//connexion à la bdd, mais ici inutile le script faisant l'appel
// include ('../controler/connexionBase.php'); //connexion à la BDD
// $db = connexionBase();  // appel de la fonction de connexion

include ('../controler/recapInsert.php');


if (isset($_POST['submit']) && count($formError) == 0) { ?> <!-- si présence POST submit et pas d'erreur -->
    <h1>SUCCESS !!</h1> <?php
} 
else { ?>
    <p><?php echo isset($formError['failed']) ? $formError['failed'] : '' ?> </p>
    <h2>Ajout</h2>

    <form action="#" method="post" enctype="multipart/form-data">  <!-- "#" pas de redirection  ;   enctype="multipart/form-data" : pour upload fichier -->
<!-- rol_id -->
        <div>
            <label for="id">Id</label>
            <input name="id" type="text">
            <span id="errorId"><?php echo isset($formError['id']) ? $formError['id'] : '' ?></span>
        </div><br>

<!-- rol_intitule -->
        <div>
            <label for="intitule">Référence</label>
            <input name="intitule" type="text">
            <span id="errorIntitule"><?php echo isset($formError['intitule']) ? $formError['intitule'] : '' ?></span>
        </div><br>

<!-- submit -->
        <br>
        <input name="submit" type="submit" class="btn btn-info btn-lg" value="création du nouveau produit">
        <br>
    </form>

<?php
}
include('footer.php');
?>

</body>
</html>