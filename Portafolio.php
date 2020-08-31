<?php include 'header_footer/header.php'; ?>

<div class="container py-4" style="border: #FE0640 2.5px solid;">            
    <div class="row justify-content-center align-items-center">           
    <div class="col-xs-12 col-sm-12 col-md-12 my-5 py-5">
        <img src="assets/img/slogan/portafolio.png" class="img-fluid" alt="">
        </div>
    </div>                
</div>

<section class="page-section bg-light my-5 py-5 pb-3 row justify-content-center" id="contact">
    <h3 class="text-center mx-5" style="font-family: 'Ethnocentric', arial; color:#FE0640;">Nuestra Galeria!</h3>
    <div class="container">
        <div class="row row-cols-1 ml-2">

        <?php
        try{
            include 'bd/conexion.php';
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT `id_video`, `nombre`, `descripcion`, `enlace` FROM `videos` ORDER BY `id_video` DESC";
                $data = '';
                foreach($con->query($sql) as $row) {
                    $data .= "<div class='col-xs-6 col-lg-6 row justify-content-center p-4'>";
                    $data .= "$row[enlace]";
                    $data .= "<p style='width:560;'>$row[nombre]</p>";
                    $data .= "<p style='width:560;'>$row[descripcion]</p>";
                    $data .= "</div>";
                }
                print($data);
            }
        catch(PDOException $E){ echo "Error en la consulta ".$E->getMessage();}

            $con = null;
        ?>
        </div>
    </div>
</section>

<?php include 'header_footer/footer.php'; ?>