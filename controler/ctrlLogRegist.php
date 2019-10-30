<?php
include('connexionBase.php');

$formError = array(); // déclaration du tableau d'erreur

//déclaration des regex pour validation côté serveur
$loginRegex = '/^[0-9A-Za-zéàùâêîôûäëïöüç]+$/';  // \w= lettres min et maj + chiffres + _
$pwdRegex = '/^[0-9A-Za-z\-\_\!\*éàùâêîôûäëïöüç]+$/';


if (isset($_POST['submit'])) {  //si présence POST submit
    if (isset($_POST['login']) && isset($_POST['pwd'])) { //si login et pwd remplis
        if (preg_match($loginRegex, $_POST['login'])) { //si login passe la regex
            $login = htmlspecialchars($_POST['login']);  //on déclare une var en specialchars
        } else { //si login passe pas la regex
            $formError['login'] = 'login non valide';
        }

        if (preg_match($pwdRegex, $_POST['pwd'])) {  //si pwd passe la regex
            $pwd = password_hash(htmlspecialchars($_POST['pwd']), PASSWORD_DEFAULT);  //on déclare une var en specialchars
        } else { //si pwd passe pas la regex
            $formError['pwd'] = 'mot de passe non valide';
        }

        if (count($formError) == 0) { //si pas d'erreurs
            //EVITER REPETITIONS DES ENTREES DANS BDD
            $select = 'SELECT count(`login`) AS `count` 
                        FROM `user` 
                        WHERE `login`= :login';
    
            $requeteSelect = $db->prepare($select);
            $requeteSelect->bindValue(':login', $login, PDO::PARAM_STR);
            $requeteSelect->execute();
            $fetchSelect = $requeteSelect->fetch(PDO::FETCH_OBJ);

            $countSelect = $fetchSelect->count;
    
            if ($countSelect == 0) {  //si login pas enregistré
            //use_rol_id=10 accès client
                $insert = 'INSERT INTO user (`login`, `mot_de_passe`, `use_rol_id`)
                            VALUES (:insert_login, :insert_pwd, 10)'; //insertion des données avec use_rol_id=10(accès client)  (admin=1)
    
                $requeteInsert = $db->prepare($insert);  //requête préparée
                $requeteInsert->bindValue(':insert_login', $login, PDO::PARAM_STR);
                $requeteInsert->bindValue(':insert_pwd', $pwd, PDO::PARAM_STR);
    
                if ($requeteInsert->execute()) { //si la requête s'exécute
                    $_SESSION['login'] = $_POST['login'];
                    $_SESSION['mot_de_passe'] = $_POST['pwd'];
                    // $_SESSION['use_rol_id'] = $exec_query1->use_rol_id;  //tabl associatif on en ressort le champ souhaité    
                } else { //si la requête ne s'exécute pas
                    $formError['Error'] = 'Problème de connexion à la base de données';
                    // echo $formError['Error'];
                }
            } 
            else { //si login déjà utilisé
                $formError['same'] = 'Identifiant déjà utilisé';
            }
        }
    } 
    else { //si login et pwd vides
        $formError['login'] = 'identifiant vide';
        $formError['pwd'] = 'identifiant vide';
    }
}
?>


<?php

//préalablement : dans MySql/bdd jardi, création table USER. Insérer nom1èrecolonne/varchar(50) puis nom2èmecolonne/varchar(50). Exécuter


//sources : 
//http://www.lephpfacile.com/cours/18-les-sessions
//https://codewithawa.com/posts/check-if-username-is-already-taken-with-php-and-mysql
?>