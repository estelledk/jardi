<?php
// session_start();  déjà lancée dans login.php/headerMsg.php
include ('connexionBase.php');
?>

<?php
// déclaration du tableau d'erreur
$connexionError = array();

//déclaration des regex pour validation côté serveur
$loginRegex = '/^[\w]+$/';  // \w= lettres min et maj + chiffres + _
$pwdRegex = '/^[a-zA-Z0-9]+$/';



if (isset($_POST['submit']))  //si présence POST submit
{
    if (isset($_POST['login']) && isset($_POST['pwd']))  //si login et pwd remplis
    {

        if (preg_match($loginRegex, $_POST['login']))  //si la valeur passe la regex
        {
    //$login
            $login = htmlspecialchars($_POST['login']);  //on déclare 1 var en specialchars
        } else {
            $connexionError['login'] = 'login non valide';
        }


        if (preg_match($pwdRegex, $_POST['pwd']))  //si la valeur passe la regex
        {
    //$pwd
            $pwd = htmlspecialchars($_POST['pwd']);  //on déclare 1 var en specialchars
        } else {
            $connexionError['pwd'] = 'mot de passe non valide';
        }
        
    } else //si login et pwd vides
    {
        $connexionError['login'] = 'identifiant vide';
        $connexionError['pwd'] = 'identifiant vide';
        header('Location: ../views/msgLogErrorVide.php');
    }


    if (count($connexionError) == 0)  //si pas d'erreurs
    {
        $select = 'SELECT * FROM `user`
                    WHERE `login` = :insert_login';  //rech du login dans bdd

        $requete = $db->prepare($select);  //requête préparée
        $requete->bindValue(':insert_login', $login, PDO::PARAM_STR);  //$login définit plus haut : specialchars du POST login

        if ($requete->execute())  //si la requête s'exécute
        {
            $fetch = $requete->fetch(PDO::FETCH_OBJ);


            if (password_verify($pwd, $fetch->mot_de_passe))  //si pwd correspond à celui de la bdd
            {
                $_SESSION['login'] = $_POST['login'];
                // $_SESSION['mot_de_passe'] = $_POST['pwd'];  par sécurité ne pas l'afficher
                $_SESSION['use_rol_id'] = $fetch->use_rol_id;  //tabl associatif on en ressort le champ souhaité

                header('Location: ../index.php');

            } else  //login non enregistré redirection vers inscription
            {
                // header('Location: ../views/msgLogErrorInconnu.php');
                $connexionError['pwd'] = 'erreur d\'identifiant';
            }

        } else  //si la requête ne s'exécute pas
        {
            $connexionError['Error'] = 'Problème de connexion à la base de données';
        }
    }
}
?>

<?php 
    // while ( $ligne = $requete->fetch() )  //va chercher la valeur à chaque ligne
    // {
    //     echo $ligne['login'].'<br>';
    // }


//source : http://www.lephpfacile.com/cours/18-les-sessions
?>