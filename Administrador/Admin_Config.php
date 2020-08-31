<?php include 'header_admin.php' ?>

<div class="container">             
    <div class="row justify-content-center">           
        <div class="col-xs-6 col-sm-6 my-3" >
            <h4 style="font-family: 'Ethnocentric', arial; color:#FE0640;" class="py-2 ml-3">Cambiar contraseña</h4>
            <form action="#" method="post" class="form ml-5" method="post">
            <input type="password" required autofocus name="actual" id="actual" style="border: #FE0640 .5px solid;" class=" my-2 form-control btn btn-light w-75" placeholder="Contraseña Actual">
            <input type="password" required name="nueva" id="nueva" style="border: #FE0640 .5px solid;" class="my-2 form-control btn btn-light w-75 mr-5" placeholder="Contraseña Nueva">
            <input type="password" required name="confirmada" id="confirmada" style="border: #FE0640 .5px solid;" class="mt-2 form-control btn btn-light w-75 mr-5" placeholder="Confirmar Contraseña"><br><br>
            <input type="submit" value="Confirmar" name="enviar" id="enviar" class="btn text-light" style="background-color: #FE0640;" >
            </form><br>    
        </div>
        
</div>     

<?php

if(isset($_POST['enviar']) && $_POST['enviar'] == 'Confirmar'){
    $actual = $_POST['actual'];
    $nueva1 = htmlentities(addslashes($_POST['nueva']));
    $nueva2 = htmlentities(addslashes($_POST['confirmada']));
    $user = $_SESSION['usuario'];

    require("../bd/conexion.php");
    $sql = "SELECT * FROM usuarios WHERE Usuario= ?";
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $resultado = $con->prepare($sql);
    $resultado->execute(array($user));
    $data = $resultado->fetch(PDO::FETCH_ASSOC);
    $con = null;

    $pas = $data['Password'];
    $id = $data['id_usuario'];

    if($actual == $pas){
        if($nueva1 == $nueva2){
            require("../bd/conexion.php");
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sqlc = "UPDATE `usuarios` SET `Password` = ? WHERE `id_usuario` = ?";
            $result = $con->prepare($sqlc);
            $result->execute(array($nueva1, $id));
            $con = null;?>
            <script>
               window.location.replace('Administrador.php'); 
            </script>

            <?php
        }else{
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>Error</strong> Las contraseña deben ser identicas.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>";
        }
    }else{
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>Error</strong> Contraseña incorrecta.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>";
    }
    
}

?>
           
</div>

<?php include 'footer.php'; ?>
