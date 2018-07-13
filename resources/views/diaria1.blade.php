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
    <title>Bitacora Diraria 1</title>
</head>

<body>

<form action="{{url('diaria/op1/success')}}" method="GET">


    <fieldset>
        <legend> <h4 style= "color:black"> Bitacora Diaria </h4></legend>
        <h2 style= "color:black"> 1&deg; Operacion y Mantenimiento preventivo </h2>

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
            <h3> Descripci&oacute;n </h3>  <br>

            Todo lo referente a las actividades de operaci&oacute;n y los mantenimientos que se realizcen. AQU&Iacute; INCLUYE TRABAJOS EN ALTURA Y EN CALIENTE, todos los trabajos peigrosos referentes a alturas y donde se maneje chispa abierta (fuego) Reportarlo como tal.

        </td>
    </tr>
    <tr>
        <td> <br><br>
            <textarea name="txtAct" cols=80 rows=5> </textarea>
        </td>

    </tr>
</table>

<div align="right"> <br><br><br><br><br>
    <input type ="submit" class="btn-secondary" name="btnOption" value="Guardar">
    <input type="submit" class="btn-secondary" name="btnOption" value="Regresar">
</div>



</form>
</body>
</html>