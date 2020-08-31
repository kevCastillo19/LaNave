
<?php 

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
        $nombre = $data['nombre'];
        $desc = $data['descripcion'];
        $foto = $data['imagen'];
        $link = $data['link'];
        $ruta_an = $data['ruta'];
        ?>

<?php include '../header_cruds.php'; ?>

<div class="container">
  <div class="form-group m-5">
    <form action="#" method="post" class="m-5 form px-5" enctype="multipart/form-data">
        <h4 class="ml-5 pl-5"style="font-family: 'Ethnocentric', arial; color:#FE0640;">Modificar Anuncio</h4>
      <div class="form-group row justify-content-center">
        <input type="text" required autofocus name="anuncio" id="anuncio" class="form-control border border-danger w-75" placeholder="Nombre del Anuncio" value = '<?php print($nombre); ?>'>
      </div>
      <div class="form-group row justify-content-center">
        <textarea name="descripcion" required id="descripcion" cols="30" rows="2" class="form-control border border-danger w-75" placeholder="Descripcion del Anuncio"><?php print($desc); ?></textarea>
      </div>
      <div class="form-group row justify-content-center">
      <input type="file" accept="image/*" name="foto" id="foto" class="form-control btn-sm border border-danger w-75" placeholder="Foto del Anuncio">
      </div>
      <div class="form-group row justify-content-center">
        <input type="text" required name="link" id="link" class="form-control border border-danger w-75" placeholder="Link del anuncio Youtube" value = '<?php print($link); ?>'>
      </div>
      <div class="form-group row justify-content-center pt-3">
      <a class='btn btn-dark btn-xs float-right' href='../Admin_Anuncios.php'>Regresar</a>
      <input type="submit" value="Guardar" name="enviar" id="enviar" class="ml-5 btn btn-danger text-light float-right">
      </div>
    </form>

    <?php

if(isset($_POST['enviar']) && $_POST['enviar'] == 'Guardar'){
    $nombre_n = $_POST['anuncio'];
    $desc_n = $_POST['descripcion'];
    $link_n = $_POST['link'];
  
    $foto_n = $_FILES['foto']['name'];
    $ruta = $_FILES['foto']['tmp_name'];
    $destino_n = '../../assets/img/Anuncios/'.$foto_n;
    $destinobd_n = 'assets/img/Anuncios/'.$foto_n;

    if($foto_n == null){
      include "../../bd/conexion.php";
      $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "UPDATE `anuncios` SET `nombre`= ?,`descripcion`= ?,`link`= ? WHERE `id_anuncio` = $id_anuncio";
      $resultado = $con->prepare($sql);
      $resultado->execute(array($nombre_n,$desc,$link));  
      $con=null;
  
      echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <strong>Anuncio modificado con Exito</strong>.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>";
    }else{
    unlink($ruta_an);
    copy($ruta,$destino_n);
    include "../../bd/conexion.php";
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE `anuncios` SET `nombre`= ?,`descripcion`= ?,`imagen`= ?,`link`= ?, `ruta`=? WHERE `id_anuncio` = $id_anuncio";
    $resultado = $con->prepare($sql);
    $resultado->execute(array($nombre_n,$desc,$destinobd_n,$link,$destino_n));  
    $con=null;
    
    echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <strong>Anuncio modificado con Exito</strong>.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>";
  }
}
  ?>
  
  </div>
</div>

<?php include '../footer.php'; ?>