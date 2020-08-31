<?php include '../header_cruds.php'; ?>

<script>
function validarImagen() {
    var fileSize = $('#imagen')[0].files[0].size;
    var siezekiloByte = parseInt(fileSize / 14024);
    if (siezekiloByte >  $('#imagen').attr('size')) {
        alert("Imagen muy grande");
        return false;
    }
}
</script>

    <div class="container">
  <div class="form-group mx-5">
    <form action="#" method="post" class="m-5 form px-5" enctype="multipart/form-data">
        <h4 class="ml-5 pl-5"style="font-family: 'Ethnocentric', arial; color:#FE0640;">Nuevo Artista</h4>
      <div class="form-group row justify-content-center">
        <input type="text" required autofocus name="artista" id="artista" class="form-control border border-danger w-75" placeholder="Nombre del Artista">
      </div>
      <div class="form-group row justify-content-center">
        <textarea name="descripcion" required id="descripcion" cols="30" rows="2" class="form-control border border-danger w-75" placeholder="Descripcion del Artista"></textarea>
      </div>
      <div class="form-group row justify-content-center">
      <input type="file" accept="image/*" required name="foto" id="imagen" class="form-control btn-sm border border-danger w-75" placeholder="Foto del Artista">
      </div>
      <div class="form-group row justify-content-center">
        <input type="text" required name="fb" id="fb" class="form-control border border-danger w-75" placeholder="Link de Facebook">
      </div>
      <div class="form-group row justify-content-center">
        <input type="text" required name="insta" id="insta" class="form-control border border-danger w-75" placeholder="Link de Instagram">
      </div>
      <div class="form-group row justify-content-center">
        <input type="text" required name="yt" id="yt" class="form-control border border-danger w-75" placeholder="Link de Youtube">
      </div>
      <div class="form-group row justify-content-center">
      <a class='btn btn-dark btn-xs float-right' href='../Admin_Artistas.php'>Regresar</a>
      <input type="submit" value="Guardar" name="enviar" id="enviar" class="ml-5 btn btn-danger text-light float-right">
      </div>
    </form>

    <?php

if(isset($_POST['enviar']) && $_POST['enviar'] == 'Guardar'){
  $nombre = $_POST['artista'];
  $desc = $_POST['descripcion'];
  $fb = $_POST['fb'];
  $insta = $_POST['insta'];
  $yt = $_POST['yt'];

  $foto = $_FILES['foto']['name'];
  $ruta = $_FILES['foto']['tmp_name'];
  $destino = '../../assets/img/Artistas/'.$foto;  //Destino es la ruta que se guardara en la base para cuando se quiera eliminar
  $destinobd = 'assets/img/Artistas/'.$foto;  //Destinobd es la ruta de la base para mostrar
  copy($ruta,$destino);

  include "../../bd/conexion.php";
  $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO `artistas`(`nombre`, `foto`, `descripcion`, `facebook`, `instagram`, `youtube`,`ruta`) VALUES (?, ?, ?, ?, ?, ?, ?)";
  $resultado = $con->prepare($sql);
  $resultado->execute(array($nombre,$destinobd,$desc,$fb,$insta,$yt,$destino));
  $con=null;

  echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <strong>Artista guardado con Exito</strong>.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>";
  }
  
  ?>
  
  </div>
</div>

<?php include '../footer.php'; ?>
