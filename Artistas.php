<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LaNave</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
    <link href="http://allfont.es/allfont.css?fonts=ethnocentric" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/estilo.css">
</head>

<body id="page-top" class="mt-4" style="background-image: url('assets/img/fondos/ARTISTAS.jpg');">
    <header class="mb-5">
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top py-4"
            style="background-image: url('assets/img/fondos/ARTISTAS.jpg');" id="mainNav">
            <?php include 'header_footer/menu.php'; ?>
        </nav><br><br><br>
    </header>

    <div class="container py-4" style="border: #FE0640 2.5px solid;">
        <div class="row justify-content-center align-items-center">
            <div class="col-xs-12 col-sm-12 col-md-12 my-5 py-5">
                <img src="assets/img/slogan/artistas.png" class="img-fluid" alt="">
            </div>
        </div>
    </div>

    <section class="page-section bg-light my-5 py-5 pb-3 row justify-content-center" id="contact">
        <h3 class="text-center pb-5 mx-5" style="font-family: 'Ethnocentric', arial; color:#FE0640;">Nuestros Artistas!
        </h3>
        <div class="container">
            <div class="row row-cols-2 ml-2">


                <?php
        try{
            include 'bd/conexion.php';
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT * FROM `artistas`";
                $data = '';
                foreach($con->query($sql) as $row) {
                    $data .= "<div class='col-xs-6 col-md-6 col-lg-6 row justify-content-center  text-center p-2'>
                    <img src='$row[foto]' alt='$row[nombre]' class='float-left img-fluid d-block border border-danger rounded w-75'>";
                    $data .= "<section class='container mt-2'>
                    <h6 style='font-family: Ethnocentric, arial; color:#FE0640;'>$row[nombre]</h6>
                    <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#exampleModal$row[id_artista]'>Ver Más</button>
                    </section>";
                    $data .= "<div class='modal fade' id='exampleModal$row[id_artista]' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                    <div class='modal-dialog'>
                      <div class='modal-content'>
                        <div class='modal-header'>
                          <h5 class='modal-title' id='exampleModalLabel' style='font-family: 'Ethnocentric', arial; color:#FE0640;'>$row[nombre]</h5>
                          <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                            </button> 
                            </div>";
                    $data .= "<div class='modal-body'>
                    <img src='$row[foto]' alt='$row[nombre]' style='width: 200px;' class='float-left img-fluid d-block rounded w-50' style='border: #FE0640 2.5px solid;'>
                    <p>$row[descripcion]</p>
                    </div>";        
                    $data .= "<div class='modal-footer'>
                    <h6 style='font-family: Ethnocentric, arial; color:#FE0640;'>Redes Sociales</h6>
                    <nav class='navbar navbar-expand-lg navbar-light py-4' id='mainNav'>
                          <div class='container'>
                              <div class='collapse navbar-collapse' id='navbarResponsive'>
                              <ul class='navbar-nav ml-auto mt-5 my-lg-3'>
                                  <li class='nav-item px-2'><a href='$row[facebook]'><img class='zoom py-2' style='width:30px;' src='assets/img/Redes_Sociales/FB.png' alt=''></a></li>
                                  <li class='nav-item px-2'><a href='$row[instagram]'><img class='zoom py-2' style='width:30px;' src='assets/img/Redes_Sociales/Instagram.png' alt=''></a></li>
                                  <li class='nav-item px-2'><a href='$row[youtube]'><img class='zoom py-2' style='width:30px;' src='assets/img/Redes_Sociales/youtube.png' alt=''></a></li>
                              </ul>
                              </div>
                          </div>
                      </nav>
                    </div>
                  </div>
                </div>
              </div>
              </div>";
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