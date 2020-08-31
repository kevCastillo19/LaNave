<?php include 'header_admin.php'; ?>

<div class="container">
<h2 class="text-center" style="font-family: 'Ethnocentric', arial; color:#FE0640;">Bienvenido <?php echo $_SESSION["usuario"]; ?></h2>
<div class="row">

<div class="col-md-3 py-4 my-5">
<a href="Admin_Artistas.php"><img src="../assets\img\portfolio\thumbnails\2.jpg" alt="" style="border: 2px solid #FE0640;" class="ml-4 d-block img-fluid zoom w-75 img-rounded"></a>
<a href="Admin_Artistas.php" style="color:#FE0640;"><h4 class="text-center pt-4" style="font-family: 'Ethnocentric', arial; color:#FE0640;">Artistas</h4></a>
</div>

<div class="col-md-3 py-4 my-5">
<a href="Admin_Beats.php"><img src="../assets\img\portfolio\thumbnails\3.jpg" alt="" style="border: 2px solid #FE0640;" class="ml-4 d-block img-fluid zoom w-75 img-rounded"></a>
<a href="Admin_Beats.php" class="text-light"><h4 class="text-center pt-4 text-light" style="font-family: 'Ethnocentric', arial;">Beat's</h4></a>
</div>

<div class="col-md-3 py-4 my-5">
<a href="Admin_Videos.php"><img src="../assets\img\portfolio\thumbnails\4.jpg" alt="" style="border: 2px solid #FE0640;" class="ml-4 d-block img-fluid zoom w-75 img-rounded"></a>
<a href="Admin_Videos.php" style="color:#FE0640;"><h4 class="text-center pt-4" style="font-family: 'Ethnocentric', arial; color:#FE0640;">Videos</h4></a>
</div>

<div class="col-md-3 py-4 my-5">
<a href="Admin_Anuncios.php"><img src="../assets\img\portfolio\thumbnails\5.jpg" alt="" style="border: 2px solid #FE0640;" class="ml-4 d-block img-fluid zoom w-75 img-rounded"></a>
<a href="Admin_Anuncios.php" class="text-light"><h4 class="text-center pt-4 text-light" style="font-family: 'Ethnocentric', arial;">Anuncios</h4></a>
</div>

</div>
</div>



<?php include 'footer.php'; ?>