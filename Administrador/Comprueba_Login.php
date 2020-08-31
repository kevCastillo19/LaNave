<?php

require_once '../bd/conexion.php';

$usuario = htmlentities(addslashes($_POST['usuario']));
$contra = htmlentities(addslashes($_POST['contraseña']));

$sql = "SELECT * FROM usuarios WHERE Usuario=:user AND Password=:pass";
$resultado = $con->prepare($sql);

$resultado->bindValue(":user",$usuario);
$resultado->bindValue(":pass",$contra);

$resultado->execute();

$count = $resultado->rowCount();

if($count != 0){

    session_start();

    $_SESSION["usuario"] = $_POST["usuario"];

    header("location: Administrador.php");

}
else {

    header("location: ../WDELN.php");

}
?>