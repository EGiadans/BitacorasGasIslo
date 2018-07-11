<!DOCTYPE html>
<html>
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
    <style>
        li {font-size:20px}
        button {font-size:20px}
        body {
            background-color: #ccffcc;
        }
    </style>
    <title>Bitacora Semanal</title>
</head>

<body>
<form action="{{url('/week/success')}}" method="GET">

<br>
<div class="container">
    <div class="row">
        <div class="col">
            <img src="logo.png" alt="HTML5 Icon">
        </div>

        <div class="col">
            <div class="card">
                <div class="card-body">
                    Numero de permiso:
                    <?php
                    $var = $_GET['selectEst'];
                    $permiso = App\Estacion::where('Nombre',$var)->value('permiso_cre');
                    echo $permiso;
                    ?>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card">
                <div class="card-body">
                    <p>Estacion de servicio:</p>
                    <?php
                    $var = $_GET['selectEst'];
                    echo $var;
                    ?>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card">
                <div class="card-body">
                    <p>Gerente:</p>
                    <?php
                    $var = $_GET['selectGer'];
                    echo $var;
                    ?>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card">
                <div class="card-body">
                    <p>Fecha:</p>
                    <?php
                    $var = $_GET['selectDate'];
                    echo $var;
                    ?>
                </div>
            </div>
        </div>

    </div>


<br>
    <div class="row">
        <div class="col">
            Persona Responsable:
            <select class="form-control form-control-sm" name="selectResp">
              <?php
                  use App\Gerente;
                  $gerentes = Gerente::all();
                  foreach ($gerentes as $gerente) {
                      echo <<<HTML
                          <option value=$gerente->id> $gerente->nombre
HTML;
              }
              ?>
            </select>

        </div>

        <div class="col">
            Persona que ejecuta:
            <select class="form-control form-control-sm" name="selectEje">
                <?php
                use App\Persona;
                $personal = Persona::all();
                foreach ($personal as $persona) {
                    echo <<<HTML
                          <option value=$persona->id> $persona->nombre
HTML;
                }
                ?>
            </select>
        </div>
    </div>

    <div class="row">
        <h3> Actividades Realizadas </h3>
            <ol>
                <?php
                    $campos = DB::table('campos_particulares')
                        ->join('formato_bitacora','formato_bitacora.ID_Particular', '=', 'campos_particulares.ID_Particular')
                        ->where('ID_Tipo_Bitacora','9T')->get();
                    $numero=0;

                    foreach ($campos as $campo) {
                        $numero++;
                        echo <<<HTML
                          <input type="checkbox" name="weekOp[]" value="$campo->ID_Formato">$numero. $campo->Nombre_Campo
                            <br>
HTML;
                }
                ?>
<!--
                    foreach ($campos as $campo) {
                        echo <<<HTML
                          <input type="checkbox" name="weekOp[]" value="$campo->ID_Particular">$campo
                            <br>
HTML;
-->

            </ol>


</div>

<div align="right">
    <button type="submit" name="btnWeek" value="Enviar"> Enviar </button>
    <button type="submit" name="btnWeek" value="Cancelar"> Cancelar </button>

</div>
</div>
</form>


</body>
</html>