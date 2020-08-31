<?php include 'header_footer/header.php'; ?>

<div class="container py-4">            
    <div class="row justify-content-center align-items-center" style="border: #FE0640 2.5px solid;">           
        <div class="col-xs-6 col-sm-6 my-5" >
            <h4 style="font-family: 'Ethnocentric', arial; color:#FE0640;" class="py-2 text-center">Contactanos</h4>
            <form action="#" class="form" method="post">
            <div class="form-group">
            <h6 class="text-light mt-2">Tu Nombre: </h6>
            <input type="text" required name="nombre" id="nombre" style="border: #FE0640 .5px solid;" class="form-control btn btn-light w-100" placeholder="Nombre" autofocus>
            </div>
            <div class="form-group">
            <h6 class="text-light mt-2">Tu Email: </h6>
            <input type="text" required name="correo" id="correo" style="border: #FE0640 .5px solid;" class="form-control btn btn-light w-100 mr-5" placeholder="Email">
            </div>
            <div class="form-group">
            <h6 class="text-light mt-2">Asunto: </h6>
            <input type="text" required name="asunto" id="asunto" style="border: #FE0640 .5px solid;" class="form-control btn btn-light w-100 mr-5" placeholder="Asunto">
            </div>
            <div class="form-group">
            <h6 class="text-light mt-2">Tu Whatsapp (Opcional): </h6>
            <input type="text" name="whats" id="whats" pattern="[0-9]{8}" style="border: #FE0640 .5px solid;" class="form-control btn btn-light w-100 mr-5" placeholder="Whatsapp">
            </div>
            <div class="form-group">
            <h6 class="text-light mt-2">Mensaje: </h6>
            <textarea name="mensaje" required id="mensaje" cols="30" rows="3" class="form-control border border-danger w-100 text-center" placeholder="Mensaje"></textarea>
            </div>
            <a class='btn btn-dark btn-xs float-left my-2 mr-5' href='javascript:history.back()'>Regresar</a>
            <input type="submit" value="Enviar" name="enviar" id="enviar" class="btn my-2 ml-4 text-light float-right" style="background-color: #FE0640;" >
            </form>
        </div>
        <?php
            if(isset($_POST['enviar']) && $_POST['enviar'] == 'Enviar'){

                $destinatario = "lanavedis.2019@gmail.com";
                $nombre = $_POST['nombre'];
                $mail = $_POST['correo'];
                $asunto = $_POST['asunto'];
                $mensaje = $_POST['mensaje'];
                $what = $_POST['whats'];

                $header = 'From: ' . $mail . " \r\n";
                $header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
                $header .= "Mime-Version: 1.0 \r\n";
                $header .= "Content-Type: text/plain";

                if(empty($what)){
                $mensaje = "Este mensaje fue enviado por " . $nombre . ",\r\n";
                $mensaje .= "Su e-mail es: " . $mail . " \r\n";
                $mensaje .= "Mensaje: " . $_POST['mensaje'] . " \r\n";
                $mensaje .= "Enviado el " . date('d/m/Y', time());
                }else{
                $mensaje = "Este mensaje fue enviado por " . $nombre . ",\r\n";
                $mensaje .= "Su e-mail es: " . $mail . " \r\n";
                $mensaje .= "Whatsapp: " . $what . " \r\n";
                $mensaje .= "Mensaje: " . $_POST['mensaje'] . " \r\n";
                $mensaje .= "Enviado el " . date('d/m/Y', time());
                }

                $result = mail($destinatario, $asunto, utf8_decode($mensaje), $header);

                if($result == true){
                    echo "<div class='alert alert-warning alert-dismissible fade show w-100 mx-5' role='alert'>
                          <strong>Mensaje con Exito</strong>.
                          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                          </button>
                          </div>";
                }else{
                    echo "<div class='alert alert-danger alert-dismissible fade show w-100 mx-5' role='alert'>
                          <strong>Error: Mensaje no enviado</strong>.
                          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                          </button>
                          </div>";
                }
            }
            ?>
    </div>                
</div>

<?php include 'header_footer/footer.php'; ?>