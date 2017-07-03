<?php include 'header.php';?>

<script>
//Objeto cliente
var Cliente=function Cliente(){
    //ATRIBUTOS COCHE
    this.generoCliente = "";
    this.thisnombreCliente = "";
    this.thisapellidoCliente = "";
    this.thisDNICliente = "";
    this.thisemailCliente = "";
    this.thistelefonoCliente = "";

    //METODO GUARDAR CLIENTE
    this.guardarCliente = function(){
           this.thisgenero = document.getElementById("selectGenero").value;
           this.thisnombreCliente = document.getElementById("nombreCliente1").value;
           this.thisapellidoCliente = document.getElementById("apellidoCliente1").value;
           this.thisDNICliente = document.getElementById("dninif1").value;
           this.thisemailCliente = document.getElementById("emailCliente").value;
           this.thistelefonoCliente = document.getElementById("telCliente").value;

           document.getElementById("lastformnombre").value = this.thisnombreCliente;
           document.getElementById("lastformapellido").value = this.thisapellidoCliente;
           document.getElementById("lastformgenero").value = this.thisgenero;
           document.getElementById("lastformdni").value = this.thisDNICliente;
           document.getElementById("lastformtel").value = this.thistelefonoCliente;
           document.getElementById("lastformemail").value = this.thisemailCliente;

    }
}
    //Objeto Reserva
    var Reserva=function Reserva(){
        //ATRIBUTOS COCHE
        this.tipoHabitacion = "";
        this.precioHabitacion = 0;
        this.propiedadesVIP = "";
        this.precioPropiedadesVip = 0;
        this.propiedadesSimple = "";
        this.precioPropiedadesSimple = 0;
        this.numDias = 0;
        this.fecha = "";
        this.comentarios = "";
        this.precioTotal=0;
        this.precioYoga = 0;
        this.precioBB = 0;
        this.precioPilates =0;
        this.precioMasaje = 0;

        this.siguienteFase2VIP = function(){
          this.tipoHabitacion = "VIP";
          var precio = 0;

          if(document.getElementById("fancy-checkbox-defaultVIP").checked == true){
            var propiedad1 =  "Cama grande";
              precio = precio+15;

          }
          if(document.getElementById("fancy-checkbox-defaultVIP2").checked == true){
            var propiedad2 =  "Jacuzzi";
            precio = precio+75;
          }

          if(document.getElementById("fancy-checkbox-defaultVIP").checked == true && document.getElementById("fancy-checkbox-defaultVIP2").checked == true){
              var fullpropiedadVIP = propiedad1 + ", " + propiedad2;
          }else if(document.getElementById("fancy-checkbox-defaultVIP").checked == true){
                var fullpropiedadVIP = propiedad1;
          }else if(document.getElementById("fancy-checkbox-defaultVIP2").checked == true){
                var fullpropiedadVIP = propiedad2;
          }

          this.precioPropiedadesVip = precio;
          this.precioHabitacion = 145;



          this.propiedadesVIP = fullpropiedadVIP;
          this.numDias = document.getElementById("numDiasClienteVIP").value;
          this.fecha = document.getElementById("fechaEntradaClienteVIP").value;
          this.comentarios = document.getElementById("comentariosiasClienteVIP").value;

          if(this.numDias != "" && this.tipoHabitacion != "" && this.fecha != ""){
            this.actividades();
          }
        }

        this.siguienteFaseSimple = function(){
          this.tipoHabitacion = "SIMPLE";
          this.numDias = document.getElementById("numDiasClienteSimple").value;
          this.fecha = document.getElementById("fechaEntradaClienteSimple").value;
          this.comentarios = document.getElementById("comentariosClienteVIPSimple").value;

          var precio = 0;

          if(document.getElementById("fancy-checkbox-defaultSimple").checked == true){
            var propiedad1 =  "Desayuno";
            precio = precio+25;
          }else{
            var propiedad1 =  "";
            precio = precio;
          }

          this.precioPropiedadesSimple = precio;
          this.propiedadesSimple = propiedad1;
          this.precioHabitacion = 35;

          if(this.numDias != "" && this.tipoHabitacion != "" && this.fecha != ""){
            this.actividades();
          }
        }

        this.siguienteFaseAmplio = function(){
          this.tipoHabitacion = "AMPLIA";
          this.numDias = document.getElementById("numDiasClienteAMPLIO").value;
          this.fecha = document.getElementById("fechaEntradaClienteAMPLIO").value;
          this.comentarios = document.getElementById("comentariosClienteVIPAMPLIO").value;

          var precio = 0;

          if(document.getElementById("fancy-checkbox-defaultAmplio").checked == true){
            var propiedad1 =  "Desayuno";
            precio = precio+25;
          }else{
            var propiedad1 =  "";
            precio = precio;
          }

          this.precioPropiedadesSimple = precio;
          this.propiedadesSimple = propiedad1;
          this.precioHabitacion = 50;

          if(this.numDias != "" && this.tipoHabitacion != "" && this.fecha != ""){
            this.actividades();
          }

        }

        this.actividades = function() {
          document.getElementById('formularioVIP').style.display = "none";
          document.getElementById('formularioAMPLIO').style.display = "none";
          document.getElementById('formularioSimple').style.display = "none";
          document.getElementById('habitacionesPaso2').style.display = "none";
          document.getElementById("actividadesPaso3").style.display = "initial";



        }

        this.checkThisActivity = function(){
          var actividades = "";
            if(document.getElementById("fancy-checkbox-bodyBalance").checked == true){
              actividades = actividades+" "+"Body Balance";
              this.precioBB = 35;
            }else if(document.getElementById("fancy-checkbox-Pilates").checked == true){
              actividades = actividades+" "+"Pilates";
              this.precioPilates =30;
            }else if(document.getElementById("fancy-checkbox-masaje").checked == true){
              actividades = actividades+" "+"Masaje";
              this.precioMasaje = 50;
            }else if(document.getElementById("fancy-checkbox-Yoga").checked == true){
              actividades = actividades+" "+"Yoga";
              this.precioYoga = 25;
            }
        }

        this.resumenAllPreciosyServicios = function(){
          document.getElementById('actividadesPaso3').style.display = "none";
          document.getElementById('resultadosSummary').style.display = "initial";
          document.getElementById('buttonMagicoCheater').style.display = "initial";

          document.getElementById('tipoHabitacionSumario').innerHTML = this.tipoHabitacion;

          document.getElementById('precioHabitacionSumario').innerHTML = this.precioHabitacion+" &euro;";

          var extrasHabitacion = "";
          var precioSumarioExtras = 0;

          if(this.tipoHabitacion == "VIP"){
            extrasHabitacion = this.propiedadesVIP;
            precioSumarioExtras = this.precioPropiedadesVip;
          }else{
            extrasHabitacion = this.propiedadesSimple;
            precioSumarioExtras = this.precioPropiedadesSimple;
          }

          var totalPrecio = 0;
          var totalPrecioconIVA = 0;
          var totalTtalisimo = 0;


          document.getElementById('extrahabitacionSumario').innerHTML = extrasHabitacion;
          document.getElementById('precioExtraSumario').innerHTML = precioSumarioExtras+" &euro;";

          document.getElementById('precioYogaSumary').innerHTML =   this.precioYoga+" &euro;";
          document.getElementById('precioPilatesSumary').innerHTML = this.precioPilates+" &euro;";
          document.getElementById('precioMasaje').innerHTML = this.precioMasaje+" &euro;";
          document.getElementById('precioBodyBalance').innerHTML = this.precioBB+" &euro;";

          var totaldiasporPrecio =0;
          //alert(this.numDias);
          totaldiasporPrecio = this.precioHabitacion * this.numDias;
          totalPrecio= precioSumarioExtras + this.precioYoga + this.precioPilates + this.precioMasaje + this.precioBB + totaldiasporPrecio;
          totalPrecioconIVA = totalPrecio*0.21;
          totalTtalisimo = totalPrecio+totalPrecioconIVA;

          document.getElementById('totalTotalisimo').innerHTML = totalTtalisimo+" &euro;";

          document.getElementById('tipohabitacionlast').value = this.tipoHabitacion;
          document.getElementById('preciohabitacionlast').value = this.precioHabitacion;
          document.getElementById('propiedadeslast').value = extrasHabitacion;
          document.getElementById('preciopropiedadeslast').value = precioSumarioExtras;
          document.getElementById('numdiaslast').value = this.numDias;
          document.getElementById('fechalast').value = this.fecha;
          document.getElementById('comentariolast').value = this.comentarios;
          document.getElementById('totalLast').value = totaldiasporPrecio;
          document.getElementById('yogaLast').value = this.precioYoga;
          document.getElementById('bodybuilderlast').value = this.precioBB;
          document.getElementById('pilatesLast').value = this.precioPilates;
          document.getElementById('masajeLast').value = this.precioMasaje;

        }


    }

var cliente1 = new Cliente;
var reserva1 = new Reserva;

function everythingOk(){
  var email  = document.getElementById('emailCliente').value;
  var nombre = document.getElementById("nombreCliente1").value;
  var apellido = document.getElementById("apellidoCliente1").value;
  var dni = document.getElementById("dninif1").value;
  var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

  if(nombre == "" || apellido == "" || email== "" || dni == "" || re.test(email) == false){
    //Validació per el nom i el llinatge
    if(!/^[a-zA-Z]*$/g.test(nombre) || nombre == "") {
        alert("Solo letras en el nombre");
        document.getElementById("nombreCliente1").style.backgroundColor = "#ff7979";
        return false;
    }else if(!/^[a-zA-Z]*$/g.test(apellido) || apellido == "") {
        alert("Solo letras en el apellido");
        document.getElementById("apellidoCliente1").style.backgroundColor = "#ff7979";
        return false;
    }else{
        document.getElementById('nombreCliente1').style.backgroundColor = "white";
        document.getElementById('apellidoCliente1').style.backgroundColor = "white";
    }

    if(document.getElementById("dninif1").value == ""){
      alert("El DNI es obligatorio");
      document.getElementById("dninif1").style.backgroundColor = "#ff7979";
    }else {
      document.getElementById("dninif1").style.backgroundColor = "white";
    }
    //COMPROVAMOS EMAIL
    if(re.test(email) == false){
        alert("Inserte un email correcto");
        document.getElementById('emailCliente').style.backgroundColor = "#ff7979";
    }else {
        document.getElementById('emailCliente').style.backgroundColor = "white";
    }

  }else{
      cliente1.guardarCliente();

      document.getElementById('formulario').style.display = "none";
      document.getElementById('habitacionesPaso2').style.display = "initial";

  }

}

  function mostrarSimpleInfo(){
    document.getElementById('formularioSimple').style.display = "initial";
    document.getElementById('formularioAMPLIO').style.display = "none";
    document.getElementById('formularioVIP').style.display = "none";
  }

  function mostrarAmpliaInfo(){
      document.getElementById('formularioAMPLIO').style.display = "initial";
      document.getElementById('formularioSimple').style.display = "none";
      document.getElementById('formularioVIP').style.display = "none";
  }
  function mostrarVipInfo(){
    document.getElementById('formularioVIP').style.display = "initial";
    document.getElementById('formularioAMPLIO').style.display = "none";
    document.getElementById('formularioSimple').style.display = "none";
  }
</script>

<style>

</style>



<!-- banner -->
<div class="banner">
    <img src="images/dublin-background.jpg"  class="img-responsive" alt="slide">
    <div class="welcome-message">
        <div class="wrap-info">
            <div class="information">
                <h1  class="animated fadeInDown">Mejor hotel de Dublín</h1>
                <p class="animated fadeInUp"> El hotel más lujoso de Irlanda, con un excelente servicio de cinco estrellas</p>
            </div>
            <a href="#information" class="arrow-nav scroll wowload fadeInDownBig"><i class="fa fa-angle-down"></i></a>
        </div>
    </div>
</div>
<!-- banner-->


<!-- reservation-information -->
<div id="information" class="spacer reserve-info ">
<div class="container">
<div class="row">
    <div class="col-md-12" id="formulario">
      <h3>Reserva</h3>
              <form  role="form" class="wowload fadeInRight">
                <div class="form-group">
                <select id="selectGenero">
                  <option value="" disabled selected> Seleccione su género</option>
                  <option>Hombre</option>
                  <option>Mujer</option>
                </select><br/><br/>
              </div>
              <div class="form-group">
                Nombre <sup>(*)</sup><input type="text" name="nombre" class="form-control" id="nombreCliente1" maxlength="20" required>
              </div>

              <div class="form-group">
                Apellido <sup>(*)</sup><input type="text" name="nombre" class="form-control" id="apellidoCliente1" maxlength="20" required>
              </div>
              <div class="form-group">
                DNI <sup>(*)</sup><input type="text" name="dninif" class="form-control"id="dninif1" maxlength="9" required>
              </div>
              <div class="form-group">
                Email <sup>(*)</sup><input type="email" name="email" class="form-control" id="emailCliente" maxlength="30" required>
              </div>
              <div class="form-group">
                Tel. <input type="text" name="numTelCliente" class="form-control" id="telCliente" maxlength="9">
              </div>
              <input type="button" class="btn btn-default" value="Siguiente" onclick="everythingOk();">
          </form>
    </div>



<!-- FORMULARIO PARA IMAGENES DE HABITACIONES -->
    <div class="col-md-12" id="habitacionesPaso2" style="display:none">
      <h2> Selecciona habitación </h2><br/>
        <div class="col-sm-4" onclick="mostrarSimpleInfo()" style="cursor:pointer;">
            <!-- SIMPLE -->
            <div id="RoomCarousel" class="carousel slide" data-ride="carousel">
              <div class="caption">SIMPLE<a href="rooms-tariff.php" class="pull-right"><i class="fa fa-edit"></i></a></div><br/>
                <div class="carousel-inner">
                <div class="item active"><img src="images/simple/simple1.jpg" class="img-responsive" alt="slide"></div>
                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#RoomCarousel" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                <a class="right carousel-control" href="#RoomCarousel" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>
            </div>
            <!-- SIMPLE--><br/>
            <div class="caption" style="text-align:center"><strong>35 &euro;</strong><a href="rooms-tariff.php" class="pull-right"></a></div>
        </div>


        <div class="col-sm-4" onclick="mostrarAmpliaInfo()" style="cursor:pointer;">
            <!-- AMPLIA -->
            <div id="TourCarousel" class="carousel slide" data-ride="carousel">
              <div class="caption">AMPLIA<a href="rooms-tariff.php" class="pull-right"><i class="fa fa-edit"></i></a></div><br/>
                <div class="carousel-inner">
                <div class="item active"><img src="images/amplia/amplia1.jpg" class="img-responsive" alt="slide"></div>

                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#TourCarousel" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                <a class="right carousel-control" href="#TourCarousel" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>
            </div>
            <!-- AMPLIA--><br/>
            <div class="caption" style="text-align:center"><strong>50 &euro;</strong><a href="rooms-tariff.php" class="pull-right"></a></div>
        </div>


        <div class="col-sm-4" onclick="mostrarVipInfo()" style="cursor:pointer;">
            <!-- VIP -->
            <div id="FoodCarousel" class="carousel slide" data-ride="carousel">
              <div class="caption">VIP<a href="rooms-tariff.php" class="pull-right"><i class="fa fa-edit"></i></a></div><br/>
                <div class="carousel-inner">
                <div class="item active"><img src="images/vip/vip1.jpg" class="img-responsive" alt="slide"></div>

                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#FoodCarousel" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                <a class="right carousel-control" href="#FoodCarousel" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>
            </div>
            <!-- VIP--><br/>
            <div class="caption" style="text-align:center"><strong>145 &euro;</strong><a href="rooms-tariff.php" class="pull-right"></a></div>
        </div>

    </div>
<!-- -------------------------------------------------------------------------------------------------------------------------------------- -->
<!-- FORMULARIO VIP -->
<div class="col-md-12" style="cursor:pointer; border:1px solid transparent; display:none;" id="formularioVIP">
          <br/><br/><br/><br/>
          <div class="[ col-xs-12 col-sm-6 ]" style="margin-left:5%; border:1px solid transparent;">
                <div class="[ form-group ]">
                    <input type="checkbox" name="fancy-checkbox-default" id="fancy-checkbox-defaultVIP" autocomplete="off" />
                    <div class="[ btn-group ]">
                        <label for="fancy-checkbox-default" class="[ btn btn-default ]">
                            15  &euro;
                        </label>
                        <label for="fancy-checkbox-default" class="[ btn btn-default active ]">
                            Cama grande
                        </label>
                    </div>
                </div>
          </div>

          <div class="[ col-xs-12 col-sm-5 ]">
                <div class="[ form-group ]">
                    <input type="checkbox" name="fancy-checkbox-default" id="fancy-checkbox-defaultVIP2" autocomplete="off" />
                    <div class="[ btn-group ]">
                        <label for="fancy-checkbox-default" class="[ btn btn-default ]">
                            75 &euro;
                        </label>
                        <label for="fancy-checkbox-default" class="[ btn btn-default active ]">
                            Jacuzzi
                        </label>
                    </div>
                </div>
          </div>
          <br/><br/><br/><br/>
          <div class="form-group">
            Fecha entrada <sup>(*)</sup><input type="date" name="fechaEntrada" class="form-control" id="fechaEntradaClienteVIP" maxlength="30" required>
          </div>

          <div class="form-group">
            Número de días <sup>(*)</sup><input type="number" name="numDias" class="form-control" id="numDiasClienteVIP" min="1" required>
          </div>

          <div class="form-group">
            Comentarios <sup>(*)</sup><input type="text" name="numDias" class="form-control" id="comentariosiasClienteVIP" maxlength="50" required>
          </div>

          <!-- BOTON SIGUIENTE -->
          <div class="col-sm-12" style="border:1px solid transparent; text-align:center;">
            <input type="button" class="btn btn-default" value="Siguiente" onclick="reserva1.siguienteFase2VIP();">
          </div>
</div>
<!-- ---------------------------------------------------------------------------------------------------------------- -->
<!-- FORMULARIO SIMPLE -->
<div class="col-md-12" style="cursor:pointer; border:1px solid transparent; display:none;" id="formularioSimple">
          <br/><br/><br/><br/>
          <div class="[ col-xs-12 col-sm-6 ]" style="margin-left:5%; border:1px solid transparent;">
                <div class="[ form-group ]">
                    <input type="checkbox" name="fancy-checkbox-default" id="fancy-checkbox-defaultSimple" autocomplete="off" />
                    <div class="[ btn-group ]">
                        <label for="fancy-checkbox-default" class="[ btn btn-default ]">
                            25  &euro;
                        </label>
                        <label for="fancy-checkbox-default" class="[ btn btn-default active ]">
                            Desayuno
                        </label>
                    </div>
                </div>
          </div>
          <br/><br/><br/><br/>
          <div class="form-group">
            Fecha entrada <sup>(*)</sup><input type="date" name="fechaEntrada" class="form-control" id="fechaEntradaClienteSimple" maxlength="30" required>
          </div>

          <div class="form-group">
            Número de días <sup>(*)</sup><input type="number" name="numDias" class="form-control" id="numDiasClienteSimple" min="1" required>
          </div>
          <div class="form-group">
            Comentarios <sup>(*)</sup><input type="text" name="numDias" class="form-control" id="comentariosClienteVIPSimple" maxlength="50" required>
          </div>

          <!-- BOTON SIGUIENTE -->
          <div class="col-sm-12" style="border:1px solid transparent; text-align:center;">
            <input type="button" class="btn btn-default" value="Siguiente" onclick="reserva1.siguienteFaseSimple();">
          </div>
</div>
<!-- ---------------------------------------------------------------------------------------------------------------- -->
<!-- FORMULARIO AMPLIO -->
<div class="col-md-12" style="cursor:pointer; border:1px solid transparent; display:none;" id="formularioAMPLIO">
          <br/><br/><br/><br/>
          <div class="[ col-xs-12 col-sm-6 ]" style="margin-left:5%; border:1px solid transparent;">
                <div class="[ form-group ]">
                    <input type="checkbox" name="fancy-checkbox-default" id="fancy-checkbox-defaultAmplio" autocomplete="off" />
                    <div class="[ btn-group ]">
                        <label for="fancy-checkbox-default" class="[ btn btn-default ]">
                            25  &euro;
                        </label>
                        <label for="fancy-checkbox-default" class="[ btn btn-default active ]">
                            Desayuno
                        </label>
                    </div>
                </div>
          </div>
          <br/><br/><br/><br/>
          <div class="form-group">
            Fecha entrada <sup>(*)</sup><input type="date" name="fechaEntrada" class="form-control" id="fechaEntradaClienteAMPLIO" maxlength="30" required>
          </div>
          <div class="form-group">
            Número de días <sup>(*)</sup><input type="number" name="numDias" class="form-control" id="numDiasClienteAMPLIO" min="1" required>
          </div>
          <div class="form-group">
            Comentarios <sup>(*)</sup><input type="text" name="numDias" class="form-control" id="comentariosClienteVIPAMPLIO" maxlength="50" required>
          </div>

          <!-- BOTON SIGUIENTE -->
          <div class="col-sm-12" style="border:1px solid transparent; text-align:center;">
            <input type="button" class="btn btn-default" value="Siguiente" onclick="reserva1.siguienteFaseAmplio();">
          </div>
</div>
<!-- ---------------------------------------------------------------------------------------------------------------- -->
<!-- ACTIVIDADES -->
<!-- FORMULARIO PARA ACTIVIDADEs -->
<div class="col-md-12" id="actividadesPaso3" style="display:none;">
      <h2> Selecciona actividades </h2><br/>
        <div class="col-sm-4" onclick="reserva1.checkThisActivity()" style="cursor:pointer;">
          <label>
            <!-- SIMPLE -->
            <div id="RoomCarouselactividades" class="carousel slide" data-ride="carousel">
              <div class="caption">Yoga</div><br/>
                <div class="carousel-inner">
                <div class="item active"><img src="images/actividades/yoga.jpg" class="img-responsive" alt="slide"></div>
                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#RoomCarousel" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                <a class="right carousel-control" href="#RoomCarousel" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>
            </div>
            <!-- SIMPLE--><br/>
            <div class="caption" style="text-align:center">
              <input type="checkbox" name="fancy-checkbox-default" id="fancy-checkbox-Yoga" autocomplete="off"/><strong>25 &euro;</strong></a></div>
            </label>
        </div>



        <div class="col-sm-4" onclick="reserva1.checkThisActivity()" style="cursor:pointer;">
          <label>
            <!-- AMPLIA -->
            <div id="TourCarouselactividades" class="carousel slide" data-ride="carousel">
              <div class="caption">Masaje</div><br/>
                <div class="carousel-inner">
                <div class="item active"><img src="images/actividades/masaje.jpg" class="img-responsive" alt="slide"></div>

                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#TourCarousel" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                <a class="right carousel-control" href="#TourCarousel" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>
            </div>
            <!-- AMPLIA--><br/>
            <div class="caption" style="text-align:center">
              <input type="checkbox" name="fancy-checkbox-default" id="fancy-checkbox-masaje" autocomplete="off" /><strong>50 &euro;</strong></a></div>
            </label>
        </div>



        <div class="col-sm-4" onclick="reserva1.checkThisActivity()" style="cursor:pointer;">
          <label>
            <!-- VIP -->
            <div id="FoodCarouselactividades" class="carousel slide" data-ride="carousel">
              <div class="caption">Pilates</div><br/>
                <div class="carousel-inner">
                <div class="item active"><img src="images/actividades/pilates.jpg" class="img-responsive" alt="slide"></div>

                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#FoodCarousel" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                <a class="right carousel-control" href="#FoodCarousel" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>
            </div>
            <!-- VIP--><br/>
            <div class="caption" style="text-align:center">
              <input type="checkbox" name="fancy-checkbox-default" id="fancy-checkbox-Pilates" autocomplete="off" /><strong>35 &euro;</strong></a></div>
          </label>
        </div>


        <div class="col-sm-4" onclick="()" style="cursor:pointer;">
        </div>

        <div class="col-sm-4" onclick="reserva1.checkThisActivity()" style="cursor:pointer;">
        <label>
            <!-- VIP -->
            <div id="FoodCarouselactividades4" class="carousel slide" data-ride="carousel">
              <div class="caption">Body balance</div><br/>
                <div class="carousel-inner">
                <div class="item active"><img src="images/actividades/bodybalance.jpg" class="img-responsive" alt="slide"></div>

                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#FoodCarousel" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                <a class="right carousel-control" href="#FoodCarousel" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>
            </div>
            <!-- VIP--><br/>
            <div class="caption" style="text-align:center">
              <input type="checkbox" name="fancy-checkbox-default" id="fancy-checkbox-bodyBalance" autocomplete="off" /><strong>35 &euro;</strong></a>
            </div>
        </label>
        </div>

        <div class="col-sm-4" onclick="()" style="cursor:pointer;">
        </div>
        <div class="col-sm-12" style="border:1px solid transparent; text-align:center;">
          <input type="button" class="btn btn-default" value="Siguiente" onclick="reserva1.resumenAllPreciosyServicios();">
        </div>

</div>
<!-- IMPRIMIR POR PANTALLA RESULTADOS -->
<div class="col-sm-5">
</div>
      <div class="col-sm-4" id="resultadosSummary" style="display:none;">
        <h2> Resumen </h2>
          <h3> Tipo habitación </h3>
          <label id="tipoHabitacionSumario"> - </label> <label id="precioHabitacionSumario"> - </label><br/><br/>
          <h3> Extras habitación </h3>
          <label id="extrahabitacionSumario"> - </label> <label id="precioExtraSumario"> - </label><br/><br/>
          <h3> Actividades extras <label id="actividadesExtrasSumario">  </label> </h3>
          <label> Yoga </label>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label id="precioYogaSumary"> - </label><br/>
          <label> Pilates </label>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label id="precioPilatesSumary"> - </label><br/>
          <label> Masaje </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <label id="precioMasaje"> - </label><br/>
          <label> Body Balance </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <label id="precioBodyBalance"> - </label><br/><br/>
          <h3> Total <label id="totalTotalisimo"> - </label> </h3>
      </div>

<!-- TESTING -->
      <div class="col-md-12" id="formuarlioLastSheet" style="display:none">
                <form  role="form" class="wowload fadeInRight" method="post" action="recibir2.php">
                    <input type="text" name="nombre" class="form-control" id="lastformnombre"><br/>
                    <input type="text" name="apellido" class="form-control" id="lastformapellido"><br/>
                    <input type="text" name="genero" class="form-control" id="lastformgenero"><br/>
                    <input type="text" name="dni" class="form-control" id="lastformdni"><br/>
                    <input type="text" name="tel" class="form-control" id="lastformtel"><br/>
                    <input type="text" name="email" class="form-control" id="lastformemail"><br/>


                    <input type="text" name="tipohabitacion" class="form-control" id="tipohabitacionlast"><br/>
                    <input type="text" name="preciohabitacion" class="form-control" id="preciohabitacionlast"><br/>
                    <input type="text" name="propiedades" class="form-control" id="propiedadeslast"><br/>
                    <input type="text" name="preciopropiedades" class="form-control" id="preciopropiedadeslast"><br/>
                    <input type="text" name="numdias" class="form-control" id="numdiaslast"><br/>
                    <input type="text" name="fecha" class="form-control" id="fechalast"><br/>
                    <input type="text" name="comentario" class="form-control" id="comentariolast"><br/>
                    <input type="text" name="total" class="form-control" id="totalLast"><br/>
                    <input type="text" name="yoga" class="form-control" id="yogaLast"><br/>
                    <input type="text" name="bodybuilder" class="form-control" id="bodybuilderlast"><br/>
                    <input type="text" name="pilates" class="form-control" id="pilatesLast"><br/>
                    <input type="text" name="masaje" class="form-control" id="masajeLast"><br/>

     </div>
       <input type="submit" class="btn btn-default" value="Finalizar" id="buttonMagicoCheater" style="display:none">
     </form>

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
