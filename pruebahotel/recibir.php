<html>
  <head>
    <style>
      h2{
          color:green;
          text-align:center;
        }
    </style>
  </head>
</html>
<?php
  include("conexion_php.php");

  //FALTA VALIDACIONES ANTI HACKERS MOFOS

  //PINTOR1
  $nombrePintor1 = $_POST["nombre1"];
  $nombrePintor1 = substr($nombrePintor1, 0, 50);
  $puntosPintor1 = $_POST["puntuacion1"];
  $puntosPintor1 = (int)substr($puntosPintor1, 0, 1);
  $descripcionPintor1 = $_POST["descripcion1"];
  $descripcionPintor1 = substr($descripcionPintor1, 0, 200);
  //PINTOR2
  $nombrePintor2 = $_POST["nombre2"];
  $nombrePintor2 = substr($nombrePintor2, 0, 50);
  $puntosPintor2 = $_POST["puntuacion2"];
  $puntosPintor2 = (int)substr($puntosPintor2, 0, 1);
  $descripcionPintor2 = $_POST["descripcion2"];
  $descripcionPintor2 = substr($descripcionPintor2, 0, 200);
  //PINTOR3
  $nombrePintor3 = $_POST["nombre3"];
  $nombrePintor3 = substr($nombrePintor3, 0, 50);
  $puntosPintor3 = $_POST["puntuacion3"];
  $puntosPintor3 = (int)substr($puntosPintor3, 0, 1);
  $descripcionPintor3 = $_POST["descripcion3"];
  $descripcionPintor3 = substr($descripcionPintor3, 0, 200);
  //PINTOR4
  $nombrePintor4 = $_POST["nombre4"];
  $nombrePintor4 = substr($nombrePintor4, 0, 50);
  $puntosPintor4 = $_POST["puntuacion4"];
  $puntosPintor4 = (int)substr($puntosPintor4, 0, 1);
  $descripcionPintor4 = $_POST["descripcion4"];
  $descripcionPintor4 = substr($descripcionPintor4, 0, 200);
  //PINTOR5
  $nombrePintor5 = $_POST["nombre5"];
  $nombrePintor5 = substr($nombrePintor5, 0, 50);
  $puntosPintor5 = $_POST["puntuacion5"];
  $puntosPintor5 = (int)substr($puntosPintor5, 0, 1);
  $descripcionPintor5 = $_POST["descripcion5"];
  $descripcionPintor5 = substr($descripcionPintor5, 0, 200);

  //print_r($_POST);

  $sql1 = "INSERT INTO pintores (nombre, puntuacion, descripcion)
  VALUES ('".$nombrePintor1."', '".$puntosPintor1."', '".  $descripcionPintor1."')";

  $sql2 = "INSERT INTO pintores (nombre, puntuacion, descripcion)
  VALUES ('".$nombrePintor2."', '".$puntosPintor2."', '".  $descripcionPintor2."')";

  $sql3 = "INSERT INTO pintores (nombre, puntuacion, descripcion)
  VALUES ('".$nombrePintor3."', '".$puntosPintor3."', '".  $descripcionPintor3."')";

  $sql4 = "INSERT INTO pintores (nombre, puntuacion, descripcion)
  VALUES ('".$nombrePintor4."', '".$puntosPintor4."', '".  $descripcionPintor4."')";

  $sql5 = "INSERT INTO pintores (nombre, puntuacion, descripcion)
  VALUES ('".$nombrePintor5."', '".$puntosPintor5."', '".  $descripcionPintor5."')";

  echo "<br/>"."<h2> Enhorabuena, has guardado en la BBDD los pintores </h2>"."<br/>";

  if (mysqli_query($conn, $sql1)){
    echo "<br/>"."Inserción correcta"."<br/>";
  } else {
    echo "Error: " . mysqli_error($conn);
  }

  if (mysqli_query($conn, $sql2)){
    echo "Inserción correcta"."<br/>";
  } else {
    echo "Error: " . mysqli_error($conn);
  }

  if (mysqli_query($conn, $sql3)){
    echo "Inserción correcta"."<br/>";
  } else {
    echo "Error: " . mysqli_error($conn);
  }

  if (mysqli_query($conn, $sql4)){
    echo "Inserción correcta"."<br/>";
  } else {
    echo "Error: " . mysqli_error($conn);
  }

  if (mysqli_query($conn, $sql5)){
    echo "Inserción correcta"."<br/>";
  } else {
    echo "Error: " . mysqli_error($conn);
  }

  	mysqli_close($conn);
?>

<form method="post" action="index.php" style="font-family: monospace; text-align:center;">
			<?php
					echo "<input type='submit' name='volver' style='font-family: monospace; text-align:center;' value='Volver al indice'><br/><br/>";
			?>
</form>
