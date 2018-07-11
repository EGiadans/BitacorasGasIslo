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

    <title>Bitacoras GASISLO</title>

    <style>
    body{
      background-color: #ccffcc;
    }
    #titleBitacora {
      background-color: #e6e6e6;
    }

    #optionsBitacora {
      background-color: white;
    }

    </style>
  </head>

  <body>


  <form action="{{url('/dailyBit')}}" method="GET">
    <div class="container">
    <br>
    <div class="container">

      <div class="row">
        <div class="col">
          <img src="logo.png" alt="Logo GasIslo">
        </div>
      </div>

      <br>

      <div class="row">
        <div class="col">
          Estacion de servicio:
          <select class="form-control form-control-sm" name="selectEst">
              <?php
                  use App\Estacion;
                  $estaciones = Estacion::all();
                  foreach ($estaciones as $estacion) {
                      echo <<<HTML
                      <option> $estacion->Nombre
HTML;
                  }
              ?>
          </select>

          <br>
          Nombre del Gerente:
          <select class="form-control form-control-sm" name="selectGer">
              <?php
                  use App\Gerente;
                  $gerentes = Gerente::all();
                  foreach ($gerentes as $gerente) {
                      echo <<<HTML
                          <option> $gerente->nombre
HTML;
              }
              ?>
          </select>

          <br>
          Fecha de la Bitacora: <br>
          <input type="date" name="selectDate">

        </div>

        <div class="col" align= 'center'>
          <div id="holder"></div>
          <div id="datepicker1"></div>
              <script type="text/javascript">
                $(function() {
                  $("#datepicker1").datepicker({
                    numberOfMonths:1
                  });
                });
              </script>
        </div>
      </div>

      <br>

      <div class="row" >
        <div class="col" id = 'titleBitacora' name="tipoBit">
          Seleccione tipo de Bitacora:
          <div class = 'col' id = 'optionsBitacora'>
            <select name="selectBit">
              <option value="day"> Diaria </option>
              <option value="week"> Semanal </option>
              <option value="month"> Mensual </option>
              <option value="threeM"> Trimestral </option>
              <option value="sixM"> Semestral </option>
              <option value="year"> Anual </option>

            </select>
                <!--<form action="">
                  <input type="radio" name="gender" value="day"> Diaria<br>
                  <input type="radio" name="gender" value="week"> Semanal<br>
                  <input type="radio" name="gender" value="month"> Mensual <br>
                  <input type="radio" name="gender" value="threeM"> Trimestral <br>
                  <input type="radio" name="gender" value="sixM"> Semestral <br>
                  <input type="radio" name="gender" value="year"> Anual <br>
                </form>-->
          </div>
        </div>

        <div class = 'col' align= 'center'>
              <input type="submit" name="btnStart" value="Registrar">

          <button type="submit" formaction="{{ url('/dailyBit/imprimir') }}">Imprimir</button>

        </div>

      </div>

      </div>

    </div>

  </form>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    </body>
</html>
