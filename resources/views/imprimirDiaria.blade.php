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
        .boton {
            position:relative;
            margin-top:100%;
        }
    </style>
    <title>Bitacora Diaria</title>
</head>

<body>

<br>
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Gas ISLO</h1>
            <!--<img src="logo.png" alt="HTML5 Icon">-->
        </div>

        <div class="col">
            <div class="card">
                <div class="card-body">
                    Folio:
                    <?php
                    $option = $_GET['selectBit'];
                    $date = $_GET['selectDate'];

                    $estacion = $_GET['selectEst'];
                    $idEst = DB::table('estaciones')
                        ->where('Nombre',$estacion)
                        ->value('ID_Estacion');

                    $id = DB::table('bitacoras')
                        ->where([
                            ['Fecha',$date],
                            ['Nombre_Bitacora',$option],
                            ['ID_estacion',$idEst],
                        ])->value('ID_Bitacora');

                    $folio = DB::table($estacion)
                        ->where('id_bitacora',$id)
                        ->value('id');

                    echo $folio;

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
                    <p>Direccion:</p>
                    <?php
                    $var = $_GET['selectEst'];
                    $direccion = App\Estacion::where('Nombre',$var)->value('Direccion');
                    echo $direccion;
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



    </div>

    <br>

    <div class="row">
        <h3> Actividades Realizadas </h3>
        <br>
    </div>

    <h4>1. Operacion y Mantenimiento Preventivo</h4>
    <div class="row">

        <ol>
            <?php
                $actividades = DB::table('datos')
                ->join('formato_bitacora', 'datos.ID_Formato', 'formato_bitacora.ID_Formato')
                ->where([
                    ['datos.ID_Bitacora',$id],
                    ['formato_bitacora.ID_Tipo_Bitacora','1T'],
                ])
                    ->orderBy('formato_bitacora.Orden')
                    ->get();

                foreach ($actividades as $dato) {
                    echo $dato->Nombre_Campo.' '.$dato->Valor;
                }
            ?>
        </ol>
    </div>

    <h4>2. Recepcion y descarga de productos</h4>
    <div class="row">
        <ol>
            <?php
            $actividades = DB::table('datos')
                ->join('formato_bitacora', 'datos.ID_Formato', 'formato_bitacora.ID_Formato')
                ->where([
                    ['datos.ID_Bitacora',$id],
                    ['formato_bitacora.ID_Tipo_Bitacora','2T'],
                ])
                ->orderBy('formato_bitacora.Orden')
                ->get();

            foreach ($actividades as $dato) {
                echo $dato->Nombre_Campo.' '.$dato->Valor;
                echo <<<HTML
                <br>
HTML;
            }
            ?>
        </ol>
    </div>

    <h4>3. Desviacion de balance de producto</h4>
    <div class="row">
        <ol>
            <?php
            $actividades = DB::table('datos')
                ->join('formato_bitacora', 'datos.ID_Formato', 'formato_bitacora.ID_Formato')
                ->where([
                    ['datos.ID_Bitacora',$id],
                    ['formato_bitacora.ID_Tipo_Bitacora','3T'],
                ])
                ->orderBy('formato_bitacora.Orden')
                ->get();

            foreach ($actividades as $dato) {
                echo $dato->Nombre_Campo.' '.$dato->Valor;
                echo <<<HTML
                <br>
HTML;
            }
            ?>
        </ol>
    </div>

    <h4>4. Incidentes e inspecciones</h4>
    <div class="row">
        <ol>
            <?php
            $actividades = DB::table('datos')
                ->join('formato_bitacora', 'datos.ID_Formato', 'formato_bitacora.ID_Formato')
                ->where([
                    ['datos.ID_Bitacora',$id],
                    ['formato_bitacora.ID_Tipo_Bitacora','4T'],
                ])
                ->orderBy('formato_bitacora.Orden')
                ->get();

            foreach ($actividades as $dato) {
                echo $dato->Nombre_Campo.' '.$dato->Valor;
                echo <<<HTML
                <br>
HTML;
            }
            ?>
        </ol>
    </div>

    <h4>5. Limpieza programada y  No programada</h4>
    <div class="row">
        <ol>
            <?php
            $actividades = DB::table('datos')
                ->join('formato_bitacora', 'datos.ID_Formato', 'formato_bitacora.ID_Formato')
                ->where([
                    ['datos.ID_Bitacora',$id],
                    ['formato_bitacora.ID_Tipo_Bitacora','5T'],
                ])
                ->orderBy('formato_bitacora.Orden')
                ->get();

            foreach ($actividades as $dato) {
                echo $dato->Nombre_Campo.' '.$dato->Valor;
                echo <<<HTML
                <br>
HTML;
            }
            ?>
        </ol>
    </div>

    <h4>6. Registro de derrames de hidrocarburos</h4>
    <div class="row">
        <ol>
            <?php
            $actividades = DB::table('datos')
                ->join('formato_bitacora', 'datos.ID_Formato', 'formato_bitacora.ID_Formato')
                ->where([
                    ['datos.ID_Bitacora',$id],
                    ['formato_bitacora.ID_Tipo_Bitacora','6T'],
                ])
                ->orderBy('formato_bitacora.Orden')
                ->get();

            foreach ($actividades as $dato) {
                echo $dato->Nombre_Campo.' '.$dato->Valor;
                echo <<<HTML
                <br>
HTML;
            }
            ?>
        </ol>
    </div>

    <h4>7. Manejo de residuos peligrosos</h4>
    <div class="row">
        <ol>
            <?php
            $actividades = DB::table('datos')
                ->join('formato_bitacora', 'datos.ID_Formato', 'formato_bitacora.ID_Formato')
                ->where([
                    ['datos.ID_Bitacora',$id],
                    ['formato_bitacora.ID_Tipo_Bitacora','7T'],
                ])
                ->orderBy('formato_bitacora.Orden')
                ->get();

            foreach ($actividades as $dato) {
                echo $dato->Nombre_Campo.' '.$dato->Valor;
                echo <<<HTML
                <br>
HTML;
            }
            ?>
        </ol>
    </div>

    <h4>8. Quejas y sugerencias</h4>
    <div class="row">
        <ol>
            <?php
            $actividades = DB::table('datos')
                ->join('formato_bitacora', 'datos.ID_Formato', 'formato_bitacora.ID_Formato')
                ->where([
                    ['datos.ID_Bitacora',$id],
                    ['formato_bitacora.ID_Tipo_Bitacora','8T'],
                ])
                ->orderBy('formato_bitacora.Orden')
                ->get();

            foreach ($actividades as $dato) {
                echo $dato->Nombre_Campo.' '.$dato->Valor;
                echo <<<HTML
                <br>
HTML;
            }
            ?>
        </ol>
    </div>

    <div class="row">
        <div class="col" align="center">
            <div class="boton">
                <button onclick="myFunction()">Imprimir</button>

                <script>
                    function myFunction() {
                        window.print();
                    }
                </script>
            </div>
        </div>
        <div class="col" align="center">
            <div class="boton">
                <button onclick="history.go(-1);">Regresar </button>
            </div>
        </div>
    </div>
</div>



</body>