<?php include '../header_cruds.php'; ?>

    <div class="container">
  <div class="form-group py-1 mx-5">
    <form action="#" method="post" class="m-5 form px-5" enctype="multipart/form-data">
        <h4 class="ml-5 pl-5"style="font-family: 'Ethnocentric', arial; color:#FE0640;">Nuevo Beat</h4>
      <div class="form-group row justify-content-center">
        <input type="text" required autofocus name="nombre_beat" id="nombre_beat" class="form-control border border-danger w-75" placeholder="Nombre del beat">
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
                    $data .= "<tr>";
                    $data .= "<option value=".$row[id_genero].">$row[genero]</option>";
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
                    $data .= "<tr>";
                    $data .= "<option value=".$row[id_estado].">$row[estado]</option>";
                }
                print($data);
                }
                catch(PDOException $E){ echo "Error en la consulta ".$E->getMessage();}

                $cn = null;
    ?>
         </select>
      </div>
      <div class="form-group row justify-content-center">
        <input type="text" required pattern="[0-9]{2}.[0-9]{2}" name="precio" id="precio" class="form-control border border-danger w-75" placeholder="$00.00">
      </div>
      <div class="form-group row justify-content-center pt-2">
      <input type="file" required name="beat" id="beat" accept="audio/*" class="form-control btn-sm border border-danger w-75" placeholder="Archivo de audio">
      </div>
      <div class="form-group row justify-content-center">
      <a class='btn btn-dark btn-xs float-right' href='../Admin_Beats.php'>Regresar</a>
      <input type="submit" value="Guardar" name="enviar" id="enviar" class="ml-5 btn btn-danger text-light float-right">
      </div>
    </form>

    <?php

if(isset($_POST['enviar']) && $_POST['enviar'] == 'Guardar'){
  $nombre = $_POST['nombre_beat'];
  $genero = $_POST['genero'];
  $estado = $_POST['estado'];
  $precio = $_POST['precio'];

  $beat = $_FILES['beat']['name'];
  $ruta = $_FILES['beat']['tmp_name'];
  $destino = '../../assets/beats/'.$beat;  //Destino es la ruta para eliminar archivo cuando ya no sea util y es donde se guarda
  $destinobd = 'assets/beats/'.$beat;  //Destinobd es la ruta para mostrar
  copy($ruta,$destino);

  include "../../bd/conexion.php";
  $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO `beats`(`nombre`, `beat`, `precio`, `id_genero`, `id_estado`, `ruta`) VALUES (?, ?, ?, ?, ?, ?)";
  $resultado = $con->prepare($sql);
  $resultado->execute(array($nombre,$destinobd,$precio,$genero,$estado,$destino));
  $con=null;
    
    echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <strong>Beat guardado con Exito</strong>.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>";
  }
  
  ?>
  
  </div>
</div>

<?php include '../footer.php'; ?>

