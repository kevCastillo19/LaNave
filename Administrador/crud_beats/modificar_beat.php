<?php 
//Llamando el id_beat y extrayendo sus datos
$id_beat = null;
    if(!empty($_GET['id_beat'])) {
        $id_beat = $_GET['id_beat'];
    }
    if($id_beat == null) {
        header("Location: ../Admin_Beats.php");
    }
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
        $nombre = $data['nombre'];
        $beat = $data['beat'];
        $precio = $data['precio'];
        $genero = $data['id_genero'];
        $estado = $data['id_estado'];
        $ruta_ant = $data['ruta'];
        ?>

<?php include '../header_cruds.php'; ?>

    <div class="container">
  <div class="form-group py-1 mx-5">
    <form action="#" method="post" class="m-5 form px-5" enctype="multipart/form-data">
        <h4 class="ml-5 pl-5"style="font-family: 'Ethnocentric', arial; color:#FE0640;">Modificar Beat</h4>
      <div class="form-group row justify-content-center">
        <input type="text" required autofocus name="nombre_beat" id="nombre_beat" class="form-control border border-danger w-75" value="<?php print($nombre); ?>" placeholder="Nombre del beat">
      </div>
      <div class="form-group row justify-content-center">
        <h6 class="text-light mr-2">Genero: </h6>
         <select name="genero" id="genero" class="form-control float-left w-25 mr-2">
         <?php
    try{
        require("../../bd/conexion.php");
        $sql = "SELECT id_genero, genero FROM genero";
        $data = "";
                foreach($con->query($sql) as $row) {
                    if($genero == $row[id_genero]){
                    $data .= "<option value=".$row[id_genero]." selected>$row[genero]</option>";
                  }else{
                    $data .= "<option value=".$row[id_genero].">$row[genero]</option>";
                  }
                }
                print($data);
                }
                catch(PDOException $E){ echo "Error en la consulta ".$E->getMessage();}

                $cn = null;
    ?>
         </select>
         <h6 class="text-light ml-5 mr-2">Estado: </h6>
         <select name="estado" id="estado" class="form-control float-none w-25 mr-2">
         <?php
    try{
        require("../../bd/conexion.php");
        $sql = "SELECT id_estado, estado FROM estado";
        $data = "";
                foreach($con->query($sql) as $row) {
                    if($estado == $row[id_estado]){
                    $data .= "<option value=".$row[id_estado]." selected>$row[estado]</option>";
                  }else{
                    $data .= "<option value=".$row[id_estado].">$row[estado]</option>";
                  }
                }
                print($data);
                }
                catch(PDOException $E){ echo "Error en la consulta ".$E->getMessage();}

                $cn = null;
    ?>
         </select>
      </div>
      <div class="form-group row justify-content-center">
        <input type="text" required pattern="[0-9]{2}.[0-9]{2}" name="precio" id="precio" class="form-control border border-danger w-75" value="<?php print($precio); ?>" placeholder="$00.00">
      </div>
      <div class="form-group row justify-content-center pt-2">
      <input type="file" accept="audio/*" name="beat" id="beat" class="form-control btn-sm border border-danger w-75" placeholder="Archivo de audio">
      </div>
      <div class="form-group row justify-content-center">
      <a class='btn btn-dark btn-xs float-right' href='../Admin_Beats.php'>Regresar</a>
      <input type="submit" value="Guardar" name="enviar" id="enviar" class="ml-5 btn btn-danger text-light float-right">
      </div>
    </form>

    <?php

if(isset($_POST['enviar']) && $_POST['enviar'] == 'Guardar'){
  $nombre_n = $_POST['nombre_beat'];
  $genero_n = $_POST['genero'];
  $estado_n = $_POST['estado'];
  $precio_n = $_POST['precio'];

  $beat_n = $_FILES['beat']['name'];
  $ruta = $_FILES['beat']['tmp_name'];
  $destino_n = '../../assets/beats/'.$beat_n;
  $destinobd_n = 'assets/beats/'.$beat_n;
  
  //Si el $beat es null es porque no actualizara el archivo
  if($beat_n == null){
    include "../../bd/conexion.php";
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE `beats` SET `nombre`= ?,`precio`= ?,`id_genero`= ?,`id_estado`= ? WHERE id_beat = ?";
    $resultado = $con->prepare($sql);
    $resultado->execute(array($nombre_n,$precio_n,$genero_n,$estado_n,$id_beat));  
    $con=null;
  
    echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
    <strong>Beat modificado con Exito</strong>.
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";
    }else{   //Si hay valor en el beat si cambiara el archivo
    unlink($ruta_ant);  //Eliminar archivo anterior de la carpeta
    copy($ruta,$destino_n);
    include "../../bd/conexion.php";
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE `beats` SET `nombre`= ?,`beat`= ?,`precio`= ?,`id_genero`= ?,`id_estado`= ?, `ruta`=? WHERE id_beat = ?";
    $resultado = $con->prepare($sql);
    $resultado->execute(array($nombre_n,$destinobd_n,$precio_n,$genero_n,$estado_n,$destino_n,$id_beat));  
    $con=null;
    
    echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <strong>Beat modificado con Exito</strong>.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>";
  }}
  
  ?>

  </div>
</div>

<?php include '../footer.php'; ?>
