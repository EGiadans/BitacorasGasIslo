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
    <title>Bitacora Diraria 7</title>
</head>

<body>
<form action="{{url('diaria/op7/success')}}" method="GET">


    <fieldset>
        <legend> <h4 style= "color:black"> Bitacora Diaria </h4></legend>
        <h2 style= "color:black"> 7&deg; Manejo de residuos peligrosos </h2>

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
            <h5>Reportar el manejo de residuos peligrosos tanto de entrada como de salida a su disposición final.

            </h5>
            <h5> Entrada y Salida </h5>

            <input type="checkbox" name="op7[]" value="Mezcla de Hidrocarburos"> Mezcla de Hidrocarburos
        </td>
    </tr> <tr>
        <td> <br>

            <input type="checkbox" name="op7[]" value="Lodos contaminados"> Lodos contaminados
        </td>
    </tr>
    <tr>
        <td> <br>

            <input type="checkbox" name="op7[]" value="Otros"> Otros
        </td>
    </tr>
</table>

<div align="right"> <br><br><br><br><br><br><br>
    <input type ="submit" class="btn-secondary" name="btnOption" value="Guardar">
    <input type="submit" class="btn-secondary" name="btnOption" value="Regresar">
</div>



</form>
</body>
</html>