<?php 
//Proceso para extraer ruta de archivo anterior 
$id_artista = null;
    if(!empty($_GET['id_artista'])) {
        $id_artista = $_GET['id_artista'];
    }
    if($id_artista == null) {
        header("Location: ../Admin_Artistas.php");
    }

    require("../../bd/conexion.php");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM artistas WHERE id_artista = ?";
            $resultado = $con->prepare($sql);
            $resultado->execute(array($id_artista));
            $data = $resultado->fetch(PDO::FETCH_ASSOC);
            $con = null;
            if(empty($data)) {
                header("Location: ../Admin_Artistas.php");
            }
            $ruta_art = $data['ruta'];
    unlink($ruta_art); //Eliminando el archivo anterior de la carpeta

//Proceso para eliminar de la base de datos
    require("../../bd/conexion.php");
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM artistas WHERE id_artista = ?";
        $resultado = $con->prepare($sql);
        $resultado->execute(array($id_artista));
        $con = null;
        ?>
<script> 
    window.location.replace('../Admin_Artistas.php'); 
</script>