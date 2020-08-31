
<?php 
//extraer datos del anuncio para borrar el anterior
$id_anuncio = null;
    if(!empty($_GET['id_anuncio'])) {
        $id_anuncio = $_GET['id_anuncio'];
    }
    if($id_anuncio == null) {
        header("Location: ../Admin_Anuncios.php");
    }
    require("../../bd/conexion.php");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM anuncios WHERE id_anuncio = ?";
            $resultado = $con->prepare($sql);
            $resultado->execute(array($id_anuncio));
            $data = $resultado->fetch(PDO::FETCH_ASSOC);
            $con = null;
            if(empty($data)) {
                header("Location: ../Admin_Anuncios.php");
            }
            $ruta_an = $data['ruta'];
     unlink($ruta_an);  //Borrar archivo que ya no se usara     

//Proceso para eliminar de la base de datos
    require("../../bd/conexion.php");
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM anuncios WHERE id_anuncio = ?";
        $resultado = $con->prepare($sql);
        $resultado->execute(array($id_anuncio));
        $con = null; ?>
<script> 
    window.location.replace('../Admin_Anuncios.php'); 
</script>

