<?php
include('connexionBase.php');

// déclaration du tableau d'erreur
$connexionError = array();

//déclaration des regex pour validation côté serveur
$loginRegex = '/^[\w]+$/';  // \w= lettres min et maj + chiffres + _
$pwdRegex = '/^[a-zA-Z0-9]+$/';



if (isset($_POST['submit'])) { //si présence POST submit
    if (isset($_POST['login']) && isset($_POST['pwd'])) {  //si login et pwd remplis
        if (preg_match($loginRegex, $_POST['login'])) {  //si login passe la regex
            $login = htmlspecialchars($_POST['login']);  //on déclare une var en specialchars
        } else {  //si login passe pas la regex
            $connexionError['login'] = 'login non valide';
        }


        if (preg_match($pwdRegex, $_POST['pwd'])) {  //si pwd passe la regex
            $pwd = htmlspecialchars($_POST['pwd']);  //on déclare une var en specialchars
        } 
        else { //si pwd passe pas la regex
            $connexionError['pwd'] = 'mot de passe non valide';
        }
        

        if (count($connexionError) == 0) {  //si pas d'erreurs
            $select = 'SELECT * FROM `user`
                        WHERE `login` = :insert_login';  //rech du login dans bdd

            $requete = $db->prepare($select);  //requête préparée
            $requete->bindValue(':insert_login', $login, PDO::PARAM_STR);  //$login définit plus haut : specialchars du POST login

            if ($requete->execute()) {  //si la requête s'exécute
                $fetch = $requete->fetch(PDO::FETCH_OBJ);

                if (password_verify($pwd, $fetch->mot_de_passe)) {  //si pwd correspond à celui de la bdd
                    $_SESSION['login'] = $_POST['login']; //par sécurité ne pas afficher session pwd
                    $_SESSION['use_rol_id'] = $fetch->use_rol_id;  //tabl associatif on en ressort le champ souhaité
                } else {  //login non enregistré redirection vers inscription
                    $connexionError['pwd'] = 'erreur d\'identifiant';
                }
            } else {  //si la requête ne s'exécute pas
                $connexionError['Error'] = 'Problème de connexion à la base de données';
            }
        }
    }
    else { //si login et pwd vides
        $connexionError['login'] = 'identifiant vide';
        $connexionError['pwd'] = 'identifiant vide';
    }
}
?>