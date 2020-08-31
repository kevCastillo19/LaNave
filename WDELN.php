<?php  
session_start();

if(isset($_SESSION["usuario"])){
	session_destroy();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LaNave</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<link href="http://allfont.es/allfont.css?fonts=ethnocentric" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/estilo.css">
</head>
<body id="page-top" class="mt-4" style="background-image: url('assets/img/fondos/Principal.jpg');">
    <header class="mb-5">
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top py-4" style="background-image: url('assets/img/fondos/Principal.jpg');" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="index.php"><img src="assets/img/logo.png" class="zoom" style="width:200px;" alt="LaNave"></a>
            </div>
        </nav><br><br><br>
        </header>

<div class="container py-4">            
    <div class="row justify-content-center" style="border: #FE0640 2.5px solid;">           
        <div class="col-xs-6 col-sm-6 my-5" >
            <h4 style="font-family: 'Ethnocentric', arial; color:#FE0640;" class="py-2 ml-5">iniciar sesión</h4>
            <form action="Administrador/Comprueba_Login.php" class="form ml-5" method="post">
            <input type="text" required name="usuario" id="usuario" style="border: #FE0640 .5px solid;" class=" my-2 form-control btn btn-light w-75" placeholder="Usuario" autofocus>
            <input type="password" required name="contraseña" id="contraseña" style="border: #FE0640 .5px solid;" class="my-2 form-control btn btn-light w-75 mr-5" placeholder="Contraseña"><br><br>
            <input type="submit" value="Ingresar" name="enviar" id="enviar" class="btn my-2 text-light" style="background-color: #FE0640;" >
            </form><br>    
            <div class="alert alert-danger text-center w-100" role="alert">Ingreso permitido solo para administradores.</div>
        </div>
    </div>                
</div>
        <!-- Footer-->
<?php include 'Administrador/footer.php'; ?>    