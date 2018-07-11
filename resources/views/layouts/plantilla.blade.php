<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    <title>Plantilla</title>

      <!-- Aqui se puede agregar el estilo de bootstrap -->
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
  <div class="contenedor">
      @yield('header')
  </div>

  <div class="infoGral">
      @yield('infoGral')
  </div>

  <div class="pie">
      @yield('footer')
  </div>


  </body>
</html>
