<!DOCTYPE html>
<html>
<head>
    <style>
        fieldset {border: 2px solid black}
        td {font-size:30px}
        select {font-size:20px}
        input {font-size:20px}
        button {font-size:30px}
        textarea {font-size:20px}
        body{
            background-color: #ccffcc;
        }
    </style>
    <title>Bitacora Diraria 2</title>
</head>

<body>
<form action="{{url('diaria/op2/success')}}" method="GET">


    <fieldset>
        <legend> <h4 style= "color:black"> Bitacora Diaria </h4></legend>
        <h2 style= "color:black"> 2&deg; Recepcion y descarga de productos </h2>

        <h2 style= "color:black"> Persona que autoriza:  </h2>
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
        <h2 style= "color:black"> Persona que ejecuta:</h2>
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

    </fieldset>






<table style="width:90%">

    <tr>
        <td> <br>
            &nbsp&nbsp&nbsp Cantidad recibida en litros: &nbsp <input type="text" name="txtCnt" size="30" maxlength="60">
        </td>
    </tr>

    <tr>
        <td> <br>
            &nbsp&nbsp&nbsp Numero de Factura: &nbsp <input type="text" name="txtFact" size="30" maxlength="60" ><br>
        </td>
    </tr>

    <tr>
        <td> <br>
            &nbsp&nbsp&nbsp Tirilla en litros: &nbsp <input type="text" name="txtTir" size="30" maxlength="60" >
        </td>
    </tr>
    <tr>
        <td><br>
            &nbsp&nbsp&nbsp Cantidad descargada en litros: &nbsp <input type="text" name="txtDesc" size="30" maxlength="60">
        </td>
    </tr>
    <tr>
        <td> <br>
            &nbsp&nbsp&nbsp Medici&oacute;n Regla en litros: &nbsp <input type="text" name="txtMed" size="30" maxlength="60"><br>
        </td>
    </tr>
    <tr>
        <td>
            <br><br>
        </td>
    </tr>
    <tr>
        <td>
            &nbsp&nbsp&nbsp Carga Adicional:
        </td>
    </tr>
    <tr>
        <td>
            <input type="radio" name="rdOption" id="myCheck"  onclick="myFunction()" value="Si Hubo">SI&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <input type="radio" name="rdOption" id="myCheck"  onclick="myFunction()" value="No Hubo">NO
        </td>

    </tr>
<br>

    <tr>



    <table id="text" style="display:none">
        <tr>
            <td> <br>
                &nbsp&nbsp&nbsp Cantidad recibida en litros: &nbsp <input type="text" name="txtCntAd" size="30" maxlength="60">
            </td>
        </tr>

        <tr>
            <td> <br>
                &nbsp&nbsp&nbsp Numero de Factura: &nbsp <input type="text" name="txtFactAd" size="30" maxlength="60" ><br>
            </td>
        </tr>

        <tr>
            <td> <br>
                &nbsp&nbsp&nbsp Tirilla en litros: &nbsp <input type="text" name="txtTirAd" size="30" maxlength="60" >
            </td>
        </tr>
        <tr>
            <td><br>
                &nbsp&nbsp&nbsp Cantidad descargada en litros: &nbsp <input type="text" name="txtDescAd" size="30" maxlength="60">
            </td>
        </tr>
        <tr>
            <td> <br>
                &nbsp&nbsp&nbsp Medici&oacute;n Regla en litros: &nbsp <input type="text" name="AP" size="30" maxlength="60"><br>
            </td>
        </tr>
        <tr>
            <td>
                <br><br>
            </td>
        </tr>

    </table>

    </tr>

    <tr align="right">
        <td align="right">
            <input type ="submit" class="btn-secondary" name="btnOption" value="Guardar">
            <input type="submit" class="btn-secondary" name="btnOption" value="Regresar">
        </td>

    </tr>

    <script>
        function myFunction() {
            var checkBox = document.getElementById("myCheck");
            var text = document.getElementById("text");
            if (checkBox.checked == true){
                text.style.display = "block";
            } else {
                text.style.display = "none";
            }
        }
    </script>








</table>

</form>
</body>
</html>