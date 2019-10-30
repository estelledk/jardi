<?php
include('header1headSession.php');
include('header3Navbar.php');
?> <title>produits</title> <?php
include('../controler/ctrlProductById.php');
?>

<h2>Détail du produit <?php echo $fetchProdJoinCat->pro_libelle ?> :</h2><br>

<!-- A COPIER _ couleur -->        
<label for="pro_couleur">Couleur</label> 
<input name="pro_couleur" id="pro_couleur" type="text" value="<?php echo $fetchProdJoinCat->pro_couleur; ?>" readonly="readonly">

<!-- description avec textarea -->
<label for="pro_description">Description</label>
<textarea name="pro_description" cols="150" rows=auto disabled><?php echo $fetchProdJoinCat->pro_description; ?></textarea><br>
  
<!-- photo avec type file -->
<img src="../../ci/assets/img/<?php echo $fetchProdJoinCat->pro_id . "." . $fetchProdJoinCat->pro_photo ?>" alt="image de <?php echo $fetchProdJoinCat->pro_libelle ?>"><br><br>

<!-- categorie avec select et option -->
<label for="pro_cat_id">Catégorie</label> 
<select name="pro_cat_id" id="pro_cat_id" type="text" disabled>
    <option value="<?php echo $fetchProdJoinCat->pro_cat_id ?>">
        <?php echo $fetchProdJoinCat->cat_nom ?>
    </option>
</select><br>

<!-- bloque -->        
<label for="pro_bloque1">Bloqué </label> 
<input name="pro_bloque1" id="pro_bloque1" type="radio" value="1" <?php echo $fetchProdJoinCat->pro_bloque == 1 ? 'checked' : '' ?> disabled>
<span>Oui</span>
<label for="pro_bloque2"></label>
<input name="pro_bloque2" id="pro_bloque2" type="radio" value="2" <?php echo ($fetchProdJoinCat->pro_bloque == NULL) || ($fetchProdJoinCat->pro_bloque == 2) ? 'checked' : '' ?> disabled>
<span>Non</span><br>

<!-- date d ajout -->
<span name="pro_d_ajout" class="form-control" readonly="readonly"><?php echo "Date d'ajout : " . $fetchProdJoinCat->pro_d_ajout; ?></span><br>
  
<!-- date modif -->
<span name="pro_d_modif" class="form-control" readonly="readonly"><?php echo "Date de modification : " . $fetchProdJoinCat->pro_d_modif; ?></span><br><br>

<!-- valider -->
<a href="products.php">
<input name="retour" type="button" class="btn-info" value="retour"></a><br><br>

<?php
include('footer.php');
?>

</body>
</html>

<?php  

// ------------------------------------------------------------------------------------------------------------------------------------------
// //CONTROLER
// //controler/ctrlProductById.php
// include('connexionBase.php');  //lance la fonction connexionBase qui est dans le fichier connexion_bdd :

// $pro_id = $_GET['pro_id'];

// //requete pour liste déroulante jointure tables produits et categories
// $selectProdJoinCat = 'SELECT * FROM `produits`
//                      INNER JOIN `categories`
//                      ON produits.pro_cat_id = categories.cat_id
//                      WHERE pro_id =' . $pro_id;
// $resultProdJoinCat = $db->query($selectProdJoinCat);  //___on fait appel à la méthode query() de l'objet $db en faisant passer en argument la reqête SQL. Le résultat est stocké dans la variable $requeteProduits
// $fetchProdJoinCat = $resultProdJoinCat->fetch(PDO::FETCH_OBJ); //___on va chercher(fetch();  fetchAll() permet d'afficher plusieurs lignes) pour obtenir le résultat sous forme d'objet avec l'utilisation du paramètre PDO::FETCH_OBJ

// return $fetchProdJoinCat;
// ------------------------------------------------------------------------------------------------------------------------------------------
?>