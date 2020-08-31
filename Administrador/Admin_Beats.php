<?php include 'header_admin.php'; ?>

<div class="container mt-5 pt-5">
<h2 class="float-left" style="font-family: 'Ethnocentric', arial; color:#FE0640;">Beat's</h2>
<a class='btn btn-info btn-xs float-right' href='crud_beats/crear_beat.php'>Nuevo</a><br><br>
            <div class="row justify-content-center">
            <div class="col-xs-12 col-lg-12 col-md-12 py-3">
            <table class="table table-responsive w-100 table-dark mb-1 text-center">
  <thead style="background-color:#FE0640;" class="text-light">
    <tr>
      <th scope="col">ID</th>
      <th scope="col" class="w-25">Nombre</th>
      <th scope="col" class="w-25">Género</th>
      <th scope="col" class="w-25">Precio</th>
      <th scope="col">Estado</th>
      <th scope="col" class="w-25">Acción</th>
    </tr>
  </thead>
  <tbody>
  <?php
          try{
            include '../bd/conexion.php';
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT `beats`.`id_beat`, `beats`.`nombre`,`beats`.`beat`, `genero`.`genero`, `beats`.`precio`, `estado`.`estado`
                FROM `beats` 
                  INNER JOIN `genero` ON `beats`.`id_genero` = `genero`.`id_genero` 
                  INNER JOIN `estado` ON `beats`.`id_estado` = `estado`.`id_estado`";
                $data = "";
                foreach($con->query($sql) as $row) {
                    $data .= "<tr>";
                    $data .= "<td>$row[id_beat]</td>";
                    $data .= "<td>$row[nombre]</td>";
                    $data .= "<td>$row[genero]</td>";
                    $data .= "<td>$$row[precio]</td>";
                    $data .= "<td>$row[estado]</td>";
                    $data .="";
                    $data .= "<td>";
                    $data .= "<a class='btn btn-xs btn-warning mx-2' href='crud_beats/modificar_beat.php?id_beat=$row[id_beat]'>Modificar</a>";
                    $data .= "<button type='button' class='btn btn-danger' data-toggle='modal' data-target='#exampleModal$row[id_beat]'>Eliminar</button>";
                    $data .= "<div class='modal fade' id='exampleModal$row[id_beat]' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                    <div class='modal-dialog'>
                      <div class='modal-content'>
                        <div class='modal-header'>
                          <h5 class='modal-title text-danger font-weight-bold' id='exampleModalLabel'>Eliminar</h5>
                          <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                            </button> 
                            </div>";
                    $data .= "<div class='modal-body text-dark'><p class='font-weight-bold'>Estas seguro de eliminar el anuncio:</p>
                              <p class='font-weight-bold'>$row[nombre]</p></div>";        
                    $data .= "<div class='modal-footer'>
                    <nav class='navbar navbar-expand-lg navbar-light py-1' id='mainNav'>
                          <div class='container'>
                              <div class='collapse navbar-collapse' id='navbarResponsive'>
                              <a class='btn btn-xs btn-danger' href='crud_beats/eliminar_beat.php?id_beat=$row[id_beat]'>Confirmar</a>
                              </div>
                          </div>
                      </nav>
                    </div>
                  </div>
                </div>
              </div>
              </div>";
                    $data .= "</td>";
                    $data .= "</tr>";
                }
                print($data);
                }
                catch(PDOException $E){ echo "Error en la consulta ".$E->getMessage();}

                $con = null;

            ?>
  </tbody>
</table>

             </div>  
        </div>
    </div>

    <?php include 'footer.php'; ?>