<?php  
session_start();

if(!isset($_SESSION["usuario"])){
    header("location: ../WDELN.php");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LaNave</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<link href="http://allfont.es/allfont.css?fonts=ethnocentric" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../css/estilo.css">
</head>
<body id="page-top" class="mt-4" style="background-image: url('../assets/img/fondos/Principal.jpg');">
    <header class="mb-5">
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top py-4" style="background-image: url('../assets/img/fondos/Principal.jpg');" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="Administrador.php"><img src="../assets/img/logo.png" class="zoom" style="width:200px;" alt="LaNave"></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto mt-5 my-lg-3">
                        <li class="nav-item px-1"><a style="font-family: 'Ethnocentric', arial; font-size: 12px;" class="nav-link js-scroll-trigger text-white px-2 zoom" href="Administrador.php">Inicio</a></li>
                        <li class="nav-item px-1"><a style="font-family: 'Ethnocentric', arial; font-size: 12px;" class="nav-link js-scroll-trigger text-white px-2 zoom" href="Admin_Artistas.php">Artistas</a></li>
                        <li class="nav-item px-1"><a style="font-family: 'Ethnocentric', arial; font-size: 12px;" class="nav-link js-scroll-trigger text-white px-2 zoom" href="Admin_Beats.php">Beat's</a></li>
                        <li class="nav-item px-1"><a style="font-family: 'Ethnocentric', arial; font-size: 12px;" class="nav-link js-scroll-trigger text-white px-2 zoom" href="Admin_Videos.php">Videos</a></li>
                        <li class="nav-item px-1"><a style="font-family: 'Ethnocentric', arial; font-size: 12px;" class="nav-link js-scroll-trigger text-white px-2 zoom" href="Admin_Anuncios.php">Anuncios</a></li>
                        <li class="nav-item px-1">
                        <div class="btn-group">
                            <button type="button" class="btn dropdown-toggle text-light zoom" style="font-family: 'Ethnocentric', arial; font-size: 12px;" data-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false">
                              Cuenta
                            </button>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left bg-dark">
                                <a href="Admin_Config.php" class="dropdown-item text-light bg-dark" type="button">Configuración</a>
                                <a href="../WDELN.php" class="dropdown-item text-light bg-dark" type="button">Cerrar Sesión</a>
                            </div>
                        </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav><br><br><br>
    </header>