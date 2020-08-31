<?php include 'header_footer/header.php'; ?>

<div class="container py-4" style="border: #FE0640 2.5px solid;">
    <div class="row justify-content-center align-items-center">
        <div class="col-xs-6 col-sm-6 my-3">
            <img src="assets/img/slogan/inicio.png" class="img-fluid" alt="">
        </div>
        <div class="col-xs-6 col-lg-6 my-3">
            <div id="carouselExampleIndicators" class="carousel slide " data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="1" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                </ol>
                <div class="carousel-inner">
                    <?php
        try{
            include 'bd/conexion.php';
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql1 = "SELECT * FROM `artistas`";
            $sqlmax = "SELECT MAX(`id_artista`) FROM `artistas`";
            $resultado = $con->prepare($sqlmax);
            $resultado->execute();
            $dat = $resultado->fetch(PDO::FETCH_ASSOC);
            $max = $dat['MAX(`id_artista`)'];

            $data = '';
            foreach($con->query($sql1) as $row1) {
              if($row1['id_artista'] == $max){
                $data .= "<div class='carousel-item active'>
                <img src='$row1[foto]' class='d-block w-100'>
                </div>";
              }else{
                $data .= "<div class='carousel-item'>
                <img src='$row1[foto]' class='d-block w-100'>
                </div>";
              }
            }
            print($data);
          }
        catch(PDOException $E){ echo "Error en la consulta ".$E->getMessage();}

            $con = null;
        ?>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<section class="page-section bg-light my-5 py-5 pb-3 row justify-content-center" id="contact">
    <h3 class="text-center" style="font-family: 'Ethnocentric', arial; color:#FE0640;">Nuevos Lanzamientos!</h3>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xs-12 col-lg-12 col-md-12">
                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">

                        <?php
        try{
            include 'bd/conexion.php';
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT * FROM `anuncios` ORDER BY `id_anuncio` DESC";

                $sqlmax1 = "SELECT MAX(`id_anuncio`) FROM `anuncios`";
                $res = $con->prepare($sqlmax1);
                $res->execute();
                $datomax = $res->fetch(PDO::FETCH_ASSOC);
                $max1 = $datomax['MAX(`id_anuncio`)'];

                $data = '';
                foreach($con->query($sql) as $row) {
                  if($row['id_anuncio'] == $max1){
                    $data .= "<div class='carousel-item active'>
                    <img src='$row[imagen]' class='d-block w-100'>
                      <div class='carousel-caption d-none d-md-block'>
                        <h5>$row[nombre]</h5>
                        <p>$row[descripcion]</p>
                        <a href='$row[link]' class='text-light'>Ir al Video</a>
                      </div>
                    </div>";
                  }else{
                    $data .= "<div class='carousel-item'>
                    <img src='$row[imagen]' class='d-block w-100'>
                      <div class='carousel-caption d-none d-md-block'>
                        <h5>$row[nombre]</h5>
                        <p>$row[descripcion]</p>
                        <a href='$row[link]' class='text-light'>Ir al Video</a>
                      </div>
                    </div>";
                  }
                }
                print($data);
            }
        catch(PDOException $E){ echo "Error en la consulta ".$E->getMessage();}

            $con = null;
        ?>

                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Footer-->
<?php include 'header_footer/footer.php'; ?>