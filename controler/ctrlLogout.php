<?php
//session_start () doit être la 1ère ligne de code
session_start ();

//destruction des variables de la session
session_unset ();

//destruction de la session
session_destroy ();

//redirection vers la page login.php
header ('location: ../index.php');
?>