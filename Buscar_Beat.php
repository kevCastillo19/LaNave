<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LaNave</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<link href="http://allfont.es/allfont.css?fonts=ethnocentric" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/estilo.css">
</head>
<body id="page-top" class="mt-4" style="background-image: url('assets/img/fondos/BEATS.jpg');">
    <header class="mb-5">
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top py-4" style="background-image: url('assets/img/fondos/BEATS.jpg');" id="mainNav">
        <?php include 'header_footer/menu.php'; ?>
        </nav><br><br><br>
        </header>

<script>
$(document).ready(function(){
  $('#nodesc').bind('contextmenu',function(){ return false; });
});
</script>

<div class="container py-4" style="border: #FE0640 2.5px solid;">            
    <div class="row justify-content-center align-items-center">           
    <div class="col-xs-12 col-sm-12 col-md-12 my-5 py-3">
        <img src="assets/img/slogan/beat.png" class="img-fluid" alt="">
        </div>
    </div>                
</div>

<?php
  $busqueda = strtolower($_POST['beat_b']);
  if(empty($busqueda)){
      header("location: Beats.php");
  }
  ?>

<section class="page-section bg-light my-5 py-5 pb-3 row justify-content-center" id="contact">
    <h3 class="text-center mr-5" style="font-family: 'Ethnocentric', arial; color:#FE0640;">Beat's Store!</h3>
  <form action="Buscar_Beat.php" class="form" method="post"> 
    <div class="input-group ml-5 mb-3 w-100">
  <input type="text" class="form-control border border-danger" id="beat_b" name="beat_b" placeholder="¿Qué estás buscando?">
  <div class="input-group-append">
    <input class="btn btn-outline-danger" type="submit" id="buscar" name="buscar" value="Buscar">
  </div>
</div>
</form> 

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xs-12 col-lg-12 col-md-12">
            <table class="table my-3 text-center" id='nodesc' >
  <thead style="background-color:#FE0640;" class="text-light">
    <tr>
    <th scope="col" class="ml-3">#</th>
      <th scope="col">Nombre</th>
      <th scope="col" class="w-25">Beat</th>
      <th scope="col">Género</th>
      <th scope="col">Precio</th>
      <th scope="col">Estado</th>
      <th scope="col" >Consultar</th>
    </tr>
  </thead>
  <tbody>
  <?php 
          try{
            include 'bd/conexion.php';
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT `beats`.`id_beat`, `beats`.`nombre`,`beats`.`beat`,`beats`.`id_estado`, `genero`.`genero`, `beats`.`precio`, `estado`.`estado`
                FROM `beats`
                  INNER JOIN `genero` ON `beats`.`id_genero` = `genero`.`id_genero` 
                  INNER JOIN `estado` ON `beats`.`id_estado` = `estado`.`id_estado` 
                  WHERE (`beats`.`nombre` LIKE '%$busqueda%'
                  OR `genero`.`genero` LIKE '%$busqueda%'
                  OR `beats`.`precio` LIKE '%$busqueda%'
                  OR `estado`.`estado` LIKE '%$busqueda%') ORDER BY `id_beat` DESC";
                $data = "";
                foreach($con->query($sql) as $row) {
                  $data .= "<tr>";
                  $data .= "<td>$row[id_beat]</td>";
                  $data .= "<td>$row[nombre]</td>";
                  $data .= "<td><audio controls='controls' controlslist='nodownload'>
                  <source src='$row[beat]' type='' /></audio></td>";
                  $data .= "<td>$row[genero]</td>";
                  $data .= "<td>$$row[precio]</td>";
                  if($row['id_estado'] == 1){
                  $data .= "<td>$row[estado]</td>";
                  $data .="";
                  $data .= "<td>";
                  $data .= "<a class='btn btn-xs btn-info mx-2' href='compra_beat.php?id_beat=$row[id_beat]'>Comprar</a>";
                  $data .= "</td>";
                  }else{
                  $data .= "<td class='text-danger'>$row[estado]</td>";
                  $data .="";
                  $data .= "<td>";
                  $data .= "";
                  $data .= "</td>";
                  }
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
</section>

<?php include 'header_footer/footer.php'; ?>