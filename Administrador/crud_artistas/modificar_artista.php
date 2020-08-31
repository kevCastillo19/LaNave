<?php 

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
        $nombre = $data['nombre'];
        $desc = $data['descripcion'];
        $foto = $data['foto'];
        $facebook = $data['facebook'];
        $insta = $data['instagram'];
        $youtube = $data['youtube'];
        $ruta_art = $data['ruta'];
        ?>

<?php include '../header_cruds.php'; ?>

    <div class="container">
  <div class="form-group mx-5">
    <form action="#" method="post" class="m-5 form px-5" enctype="multipart/form-data">
        <h4 class="ml-5 pl-5"style="font-family: 'Ethnocentric', arial; color:#FE0640;">Modificar Artista</h4>
      <div class="form-group row justify-content-center">
        <input type="text" required autofocus name="artista" id="artista" class="form-control border border-danger w-75" placeholder="nombre del artista" value = '<?php print($nombre); ?>'>
      </div>
      <div class="form-group row justify-content-center">
        <textarea name="descripcion" required id="descripcion" cols="30" rows="2" class="form-control border border-danger w-75" placeholder="Descripcion del Artista"><?php print($desc); ?></textarea>
      </div>
      <div class="form-group row justify-content-center">
      <input type="file" accept="image/*" name="foto" id="foto" class="form-control btn-sm border border-danger w-75" value='<?php print($foto); ?>'>
      </div>
      <div class="form-group row justify-content-center">
        <input type="text" required name="fb" id="fb" class="form-control border border-danger w-75" placeholder="link de Facebook" value = '<?php print($facebook); ?>'>
      </div>
      <div class="form-group row justify-content-center">
        <input type="text" required name="insta" id="insta" class="form-control border border-danger w-75" placeholder="link de Instagram" value = '<?php print($insta); ?>'>
      </div>
      <div class="form-group row justify-content-center">
        <input type="text" required name="yt" id="yt" class="form-control border border-danger w-75" placeholder="link de YouTube" value = '<?php print($youtube); ?>'>
      </div>
      <div class="form-group row justify-content-center">
      <a class='btn btn-dark btn-xs float-right' href='../Admin_Artistas.php'>Regresar</a>
      <input type="submit" value="Guardar" name="enviar" id="enviar" class="ml-5 btn btn-danger text-light float-right">
      </div>
    </form>

    <?php

if(isset($_POST['enviar']) && $_POST['enviar'] == 'Guardar'){
    $nombre_n = $_POST['artista'];
    $desc_n = $_POST['descripcion'];
    $fb_n = $_POST['fb'];
    $insta_n = $_POST['insta'];
    $yt_n = $_POST['yt'];
  
    $foto_n = $_FILES['foto']['name'];
    $ruta = $_FILES['foto']['tmp_name'];
    $destino_n = '../../assets/img/Artistas/'.$foto_n;
    $destinobd_n = 'assets/img/Artistas/'.$foto_n;

    if($foto_n == null){  //Si no encuentra foto es porque no se actualizara
    include "../../bd/conexion.php";
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE `artistas` SET `nombre`= ?,`descripcion`= ?,`facebook`= ?,`instagram`= ?,`youtube`= ? WHERE `id_artista` = $id_artista";
    $resultado = $con->prepare($sql);
    $resultado->execute(array($nombre_n,$desc_n,$fb_n,$insta_n,$yt_n));  
    $con=null;

    echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <strong>Artista modificado con Exito</strong>.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>";
    }else{  //En caso de actializarse
    unlink($ruta_art);  //Eliminando archivo anterior
    copy($ruta,$destino_n);
    include "../../bd/conexion.php";
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE `artistas` SET `nombre`= ?,`foto`= ?,`descripcion`= ?,`facebook`= ?,`instagram`= ?,`youtube`= ?, `ruta` = ? WHERE `id_artista` = $id_artista";
    $resultado = $con->prepare($sql);
    $resultado->execute(array($nombre_n,$destinobd_n,$desc_n,$fb_n,$insta_n,$yt_n,$destino_n));  
    $con=null;
    
    echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <strong>Artista modificado con Exito</strong>.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>";
  }}
  
  ?>
  
  </div>
</div>

<?php include '../footer.php'; ?>

