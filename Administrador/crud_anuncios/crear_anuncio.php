<?php include '../header_cruds.php'; ?>

<div class="container">
  <div class="form-group m-5">
    <form action="#" method="post" class="m-5 form px-5" enctype="multipart/form-data">
        <h4 class="ml-5 pl-5"style="font-family: 'Ethnocentric', arial; color:#FE0640;">Nuevo Anuncio</h4>
      <div class="form-group row justify-content-center">
        <input type="text" required autofocus name="anuncio" id="anuncio" class="form-control border border-danger w-75" placeholder="Nombre del Anuncio">
      </div>
      <div class="form-group row justify-content-center">
        <textarea name="descripcion" required id="descripcion" cols="30" rows="2" class="form-control border border-danger w-75" placeholder="Descripcion del Anuncio"></textarea>
      </div>
      <div class="form-group row justify-content-center">
      <input type="file" accept="image/*" required name="foto" id="foto" class="form-control btn-sm border border-danger w-75" placeholder="Foto del Anuncio">
      </div>
      <div class="form-group row justify-content-center">
        <input type="text" required name="link" id="link" class="form-control border border-danger w-75" placeholder="Link del anuncio Youtube">
      </div>
      <div class="form-group row justify-content-center pt-3">
      <a class='btn btn-dark btn-xs float-right' href='../Admin_Anuncios.php'>Regresar</a>
      <input type="submit" value="Guardar" name="enviar" id="enviar" class="ml-5 btn btn-danger text-light float-right">
      </div>
    </form>

    <?php

if(isset($_POST['enviar']) && $_POST['enviar'] == 'Guardar'){
  $nombre = $_POST['anuncio'];
  $desc = $_POST['descripcion'];
  $link = $_POST['link'];

  $foto = $_FILES['foto']['name'];
  $ruta = $_FILES['foto']['tmp_name'];
  $destino = '../../assets/img/Anuncios/'.$foto; //Destino es la ruta que se guardara en la base para cuando se quiera eliminar y es donde se guarda
  $destinobd = 'assets/img/Anuncios/'.$foto;  //Destinobd es la ruta para mostrar
  copy($ruta,$destino);

  include "../../bd/conexion.php";
  $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO `anuncios`(`nombre`, `descripcion`, `imagen`, `link`,`ruta`) VALUES (?, ?, ?, ?, ?)";
  $resultado = $con->prepare($sql);
  $resultado->execute(array($nombre,$desc,$destinobd,$link,$destino));
  $con=null;
    
    echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <strong>Anuncio guardado con Exito</strong>.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>";
  }
  
  ?>

  </div>
</div>

<?php include '../footer.php'; ?>