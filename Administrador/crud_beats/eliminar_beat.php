<?php 
//Llamando el id_beat
$id_beat = null;
    if(!empty($_GET['id_beat'])) {
        $id_beat = $_GET['id_beat'];
    }
    if($id_beat == null) {
        header("Location: ../Admin_Beats.php");
    }
//Proceso para extraer la ruta del archivo anterior y eliminarlo
    require("../../bd/conexion.php");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM beats WHERE id_beat = ?";
            $resultado = $con->prepare($sql);
            $resultado->execute(array($id_beat));
            $data = $resultado->fetch(PDO::FETCH_ASSOC);
            $con = null;
            if(empty($data)) {
                header("Location: ../Admin_Beats.php");
            }
            $ruta_ant = $data['ruta'];
    unlink($ruta_ant);

//Proceso para eliminar en la base de datos
    require("../../bd/conexion.php");
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM beats WHERE id_beat = ?";
        $resultado = $con->prepare($sql);
        $resultado->execute(array($id_beat));
        $con = null;
        ?>
<script> 
    window.location.replace('../Admin_Beats.php'); 
</script>