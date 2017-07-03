<?php include 'header.php';?>

<script>

</script>

<?php
  include("conexion_php.php");

  //print_r($_POST);

  $nombre = $_POST["nombre"];
  $apellido = $_POST["apellido"];
  $genero = $_POST["genero"];
  $dni = $_POST["dni"];
  $tel = $_POST["tel"];
  $email = $_POST["email"];

$tipohabitacion =  $_POST["tipohabitacion"];
$precio_habitacion =  $_POST["preciohabitacion"];
$propiedades_habitaciones =  $_POST["propiedades"];
$precio_propiedades =  $_POST["preciopropiedades"];
$fecha =  $_POST["fecha"];
$dias =  $_POST["numdias"];
$comentarios =  $_POST["comentario"];
$precio_yoga =  $_POST["yoga"];
$precio_bb =  $_POST["bodybuilder"];
$precio_pilates =  $_POST["pilates"];
$precio_masaje =  $_POST["masaje"];
$precio_total =  $_POST["total"];


  print_r($_POST);

  echo "<br/><br/><br/><br/><br/>"."<h2 style='text-align:center'> Enhorabuena, has guardado en la BBDD el cliente y su reserva </h2>"."<br/>";

  $sql1 = "INSERT INTO clientes (nombre, apellido, dni, email, telefono, genero)
  VALUES ('".$nombre."', '".$apellido."', '".  $dni."', '".  $email."', '".  $tel."', '".  $genero."')";

  $sql2 = "INSERT INTO reservas (tipo_habitacion, precio_habitacion, propiedades_habitaciones, precio_propiedades, fecha, dias, comentarios, precio_yoga, precio_bb, 	precio_pilates, precio_masaje, 	precio_total)
  VALUES ('".$tipohabitacion."', '".$precio_habitacion."', '".  $propiedades_habitaciones."', '".  $precio_propiedades."', '".  $fecha."', '".  $dias."', '".  $comentarios."', '".  $precio_yoga."', '".  $precio_bb."', '".  $precio_pilates."', '".  $precio_masaje."', '".  $precio_total."')";

  if (mysqli_query($conn, $sql1)){
    echo "<br/>"."<p style='text-align:center'>Inserción correcta </p>"."<br/>";
  } else {
    echo "<p style='text-align:center'>Error: </p>" . mysqli_error($conn);
  }

  if (mysqli_query($conn, $sql2)){
    echo "<br/>"."<p style='text-align:center'>Inserción correcta </p>"."<br/>";
  } else {
    echo "<p style='text-align:center'>Error: </p>" . mysqli_error($conn);
  }

  mysqli_close($conn);
 ?>
<style>
</style>

<!-- reservation-information -->
<div id="information" class="spacer reserve-info ">
<div class="container">
<div class="row">
</div>
</div>
</div>
<!-- reservation-information -->



<!-- services -->
<div class="spacer services wowload fadeInUp">
<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <!-- RoomCarousel -->
            <div id="RoomCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                <div class="item active"><img src="images/photos/8.jpg" class="img-responsive" alt="slide"></div>
                <div class="item  height-full"><img src="images/photos/9.jpg"  class="img-responsive" alt="slide"></div>
                <div class="item  height-full"><img src="images/photos/10.jpg"  class="img-responsive" alt="slide"></div>
                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#RoomCarousel" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                <a class="right carousel-control" href="#RoomCarousel" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>
            </div>
            <!-- RoomCarousel-->
            <div class="caption">Rooms<a href="#" class="pull-right"><i class="fa fa-edit"></i></a></div>
        </div>


        <div class="col-sm-4">
            <!-- RoomCarousel -->
            <div id="TourCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                <div class="item active"><img src="images/photos/6.jpg" class="img-responsive" alt="slide"></div>
                <div class="item  height-full"><img src="images/photos/3.jpg"  class="img-responsive" alt="slide"></div>
                <div class="item  height-full"><img src="images/photos/4.jpg"  class="img-responsive" alt="slide"></div>
                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#TourCarousel" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                <a class="right carousel-control" href="#TourCarousel" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>
            </div>
            <!-- RoomCarousel-->
            <div class="caption">Tour Packages<a href="#" class="pull-right"><i class="fa fa-edit"></i></a></div>
        </div>


        <div class="col-sm-4">
            <!-- RoomCarousel -->
            <div id="FoodCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                <div class="item active"><img src="images/photos/1.jpg" class="img-responsive" alt="slide"></div>
                <div class="item  height-full"><img src="images/photos/2.jpg"  class="img-responsive" alt="slide"></div>
                <div class="item  height-full"><img src="images/photos/5.jpg"  class="img-responsive" alt="slide"></div>
                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#FoodCarousel" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                <a class="right carousel-control" href="#FoodCarousel" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>
            </div>
            <!-- RoomCarousel-->
            <div class="caption">Food and Drinks<a href="#" class="pull-right"><i class="fa fa-edit"></i></a></div>
        </div>
    </div>




</div>
</div>
<!-- services -->


<?php include 'footer.php';?>
