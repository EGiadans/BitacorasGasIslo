<!doctype html>
<html lang="en">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link href="CSS/Master.css" rel="stylesheet" type="text/css" />

    <title>Bitacora Diaria</title>

    <style>
    body{
      background-color: #ccffcc;
    }
    a {
       padding: 3px;
       border: 2px solid black;
       display: inline-block;
       background-color: white;
    }
    a:hover {
      border: 2px solid green;
    }

    </style>
  </head>

  <body>


    <br>

    <div class="container">
      <form action="{{url('/dailyBit/end')}}" method="GET">
      <div class="row">
        <div class="col">
          <img src="logo.png" alt="HTML5 Icon">
        </div>
<!--
        <div class="col">
          <div class="card">
            <div class="card-body">
              Numero de permiso
              <?php
                //$var = $_GET['selectEst'];
                //$permiso = App\Estacion::where('Nombre',$var)->value('permiso_cre');
                //echo $permiso;
              ?>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card">
            <div class="card-body">
              Estacion de servicio:
                  <?php
                  //$var = $_GET['selectEst'];
                  //echo $var;
                  ?>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card">
            <div class="card-body">
              <p>Gerente:</p>
                <?php
                //$var = $_GET['selectGer'];
                //echo $var;
                ?>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card">
            <div class="card-body">
              <p>Fecha:</p>
                <?php
                //$var = $_GET['selectDate'];
                //echo $var;
                ?>
            </div>
          </div>
        </div>
-->
      </div>

      <br>


      <div class="row">

        <div class="card" style="width: 17.5rem; height: 15.5rem" >
            <br>
            <div class="text-center">
          <img class="ROUNDED" src="engranes.png" alt="Card image cap" height="100px">
            </div>
          <div class="card-body">
              <center>
            <h6 class="card-title">1. Operacion y Mantenimiento preventivo</h6>

                  <a href={{url('diaria/op1')}} class="btn btn-secondary">Llenar</a>

              </center>
          </div>
        </div>

        <div class="card" style="width: 17.5rem; height: 15.5rem" >
          <br>
          <div class="text-center">
            <img class="ROUNDED" src="camion.png" alt="Card image cap" height="100px">
          </div>
          <div class="card-body">
            <center>
              <h6 class="card-title">2. Recepcion y Descarga de Productos</h6>

              <a href={{url('diaria/op2')}} class="btn btn-secondary">Llenar</a>

            </center>
          </div>
        </div>

        <div class="card" style="width: 17.5rem; height: 15.5rem" >
          <br>
          <div class="text-center">
            <img class="ROUNDED" src="gasolinera.png" alt="Card image cap" height="100px">
          </div>
          <div class="card-body">
            <center>
              <h6 class="card-title">3. Desviacion de Balance de Producto</h6>

              <a href={{url('diaria/op3')}} class="btn btn-secondary">Llenar</a>

            </center>
          </div>
        </div>

        <div class="card" style="width: 17.5rem; height: 15.5rem" >
          <br>
          <div class="text-center">
            <img class="ROUNDED" src="lupa.png" alt="Card image cap" height="100px">
          </div>
          <div class="card-body">
            <center>
              <h6 class="card-title">4. Incidentes e inspecciones </h6>

              <a href={{url('diaria/op4')}} class="btn btn-secondary">Llenar</a>

            </center>
          </div>
        </div>



      </div>

      <br>

      <div class="row">

        <div class="card" style="width: 17.5rem; height: 15.5rem" >
          <br>
          <div class="text-center">
            <img class="ROUNDED" src="manos.png" alt="Card image cap" height="100px">
          </div>
          <div class="card-body">
            <center>
              <h6 class="card-title">5. Limpieza programada y No programada (incluye LE)</h6>

              <a href={{url('diaria/op5')}} class="btn btn-secondary">Llenar</a>

            </center>
          </div>
        </div>

        <div class="card" style="width: 17.5rem; height: 15.5rem" >
          <br>
          <div class="text-center">
            <img class="ROUNDED" src="lata.png" alt="Card image cap" height="100px">
          </div>
          <div class="card-body">
            <center>
              <h6 class="card-title">6. Registro de derrames de hidrocarburos</h6>

              <a href={{url('diaria/op6')}} class="btn btn-secondary">Llenar</a>

            </center>
          </div>
        </div>

        <div class="card" style="width: 17.5rem; height: 15.5rem" >
          <br>
          <div class="text-center">
            <img class="ROUNDED" src="tanque.png" alt="Card image cap" height="100px">
          </div>
          <div class="card-body">
            <center>
              <h6 class="card-title">7. Manejo de Residuos Peligrosos</h6>

              <a href={{url('diaria/op7')}} class="btn btn-secondary">Llenar</a>

            </center>
          </div>
        </div>

        <div class="card" style="width: 17.5rem; height: 15.5rem" >
          <br>
          <div class="text-center">
            <img class="ROUNDED" src="mono.png" alt="Card image cap" height="100px">
          </div>
          <div class="card-body">
            <center>
              <h6 class="card-title">8. Quejas y Sugerencias</h6>

              <a href={{url('diaria/op8')}} class="btn btn-secondary">Llenar</a>

            </center>
          </div>
        </div>

      </div>

      <br>


      <div class="row" align="center">
        <button type="submit" name="btnDay" value="Enviar"> Enviar </button>
        <button type="submit" name="btnDay" value="Cancelar"> Cancelar </button>
      </div>


      </form>
</div>
    <br>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->


    </body>
</html>
