
<?php include '../header_cruds.php'; ?>

<div class="container pt-2">
  <div class="form-group m-5">
    <form action="#" method="post" class="m-5 form px-5">
        <h4 class="ml-5 pl-5"style="font-family: 'Ethnocentric', arial; color:#FE0640;">Nuevo Video</h4>

      <div class="form-group row justify-content-center">
        <input type="text" required autofocus name="video" id="video" class="form-control border border-danger w-75" placeholder="Nombre del video">
      </div>
      <div class="form-group row justify-content-center">
        <textarea name="descripcion" required id="descripcion" cols="30" rows="2" class="form-control border border-danger w-75" placeholder="Descripcion del video"></textarea>
      </div>
      <div class="form-group row justify-content-center">
        <input type="text" required name="link" id="link" class="form-control border border-danger w-75" placeholder="Enlace de Youtube">
      </div>
      <div class="form-group row justify-content-center pt-3">
      <a class='btn btn-dark btn-xs float-right' href='../Admin_Videos.php'>Regresar</a>
      <input type="submit" value="Guardar" name="enviar" id="enviar" class="ml-5 btn btn-danger text-light float-right">
      </div>
    </form>

    <?php

if(isset($_POST['enviar']) && $_POST['enviar'] == 'Guardar'){

  $nombre = $_POST['video'];
  $desc = $_POST['descripcion'];
  $link = $_POST['link'];

  include "../../bd/conexion.php";
  $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO `videos`(`nombre`, `descripcion`, `enlace`) VALUES (?,?,?)";
  $resultado = $con->prepare($sql);
  $resultado->execute(array($nombre,$desc,$link));
  $con=null;

  echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <strong>Video guardado con Exito</strong>.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>";

}

?>
  
  </div>
</div>

<?php include '../footer.php'; ?>

