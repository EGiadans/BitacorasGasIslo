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
    <title>Bitacora para imprimir</title>
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
                        echo 'Folio';
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

        <div class="row">
            <ol>
                <?php
                foreach ($data as $dato) {
                    echo $dato->Nombre_Campo;
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


