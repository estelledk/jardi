<?php
session_start();  //utilisé sur autres pages 

$page = strrchr($_SERVER['SCRIPT_NAME'], '/');  //variable prenant l'adresse de la page courante
?>

<!DOCTYPE html>
<html>
<head>
<!-- responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">  <!-- s'adapte à la taille écran -->
<!-- lien bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <meta charset="UTF-8">