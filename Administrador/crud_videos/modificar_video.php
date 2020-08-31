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
        $sql = "SELECT * FROM videos WHERE id_video = ?";
        $resultado = $con->prepare($sql);
        $resultado->execute(array($id_video));
        $data = $resultado->fetch(PDO::FETCH_ASSOC);
        $con = null;
        if(empty($data)) {
            header("Location: ../Admin_Videos.php");
        }
        $nombre = $data['nombre'];
        $desc = $data['descripcion'];
        $enlace = $data['enlace'];
        ?>
<?php include '../header_cruds.php'; ?>

<div class="container pt-2">
  <div class="form-group m-5">
    <form action="#" method="post" class="m-5 form px-5">
        <h4 class="ml-5 pl-5"style="font-family: 'Ethnocentric', arial; color:#FE0640;">Modificar Video</h4>
      <div class="form-group row justify-content-center">
        <input type="text" required autofocus name="video" id="video" class="form-control border border-danger w-75" placeholder="nombre del video" value="<?php print($nombre); ?>">
      </div>
      <div class="form-group row justify-content-center">
        <textarea name="descripcion" required id="descripcion" cols="30" rows="2" class="form-control border border-danger w-75" placeholder="descripcion del video"><?php print($desc); ?></textarea>
      </div>
      <div class="form-group row justify-content-center">
        <input type="text" required name="link" id="link" class="form-control border border-danger w-75" placeholder="link del video" value='<?php print($enlace); ?>'>
      </div>
      <div class="form-group row justify-content-center pt-3">
      <a class='btn btn-dark btn-xs float-right' href='../Admin_Videos.php'>Regresar</a>
      <input type="submit" value="Guardar" name="enviar" id="enviar" class="ml-5 btn btn-danger text-light float-right">
      </div>
    </form>

    <?php

if(isset($_POST['enviar']) && $_POST['enviar'] == 'Guardar'){

  $nombre_nuevo = $_POST['video'];
  $desc_nuevo = $_POST['descripcion'];
  $link_nuevo = $_POST['link'];

  include "../../bd/conexion.php";
  $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "UPDATE `videos` SET `nombre`= ?,`descripcion`= ?,`enlace`= ? WHERE id_video = ?";
  $resultado = $con->prepare($sql);
  $resultado->execute(array($nombre_nuevo,$desc_nuevo,$link_nuevo,$id_video));
  $con=null;

  echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <strong>Video modificado con Exito</strong>.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>";

}

?>
  
  </div>
</div>

<?php include '../footer.php'; ?>


