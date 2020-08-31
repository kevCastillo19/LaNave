<?php 

$id_video = null;
    if(!empty($_GET['id_video'])) {
        $id_video = $_GET['id_video'];
    }
    if($id_video == null) {
        header("Location: ../Admin_Videos.php");
    }
    require("../../bd/conexion.php");
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM videos WHERE id_video = ?";
        $resultado = $con->prepare($sql);
        $resultado->execute(array($id_video));
        $con = null;
        ?>
<script> 
    window.location.replace('../Admin_Videos.php'); 
</script>