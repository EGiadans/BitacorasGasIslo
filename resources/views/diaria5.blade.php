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
    <title>Bitacora Diraria 5</title>
</head>

<body background="tela-crepe-muselina-verde-menta.jpg">
<form action="{{url('diaria/op5/success')}}">


<fieldset>
    <legend> <h4 style= "color:black"> Bitacora Diaria </h4></legend>
    <h2 style= "color:black"> 5&deg; Limpieza programada y no programada </h2>

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
            <h3>Mantenimiento Diario</h3>
            &nbsp&nbsp&nbsp Descripcion: &nbsp <input type="text" name="txtAct" size="30" maxlength="60">
        </td>
    </tr>

    <tr>
        <td> <br>
            <h3> Actividades Realizadas </h3>

            <input type="checkbox" name="val5[]" value="Todo Limpieza en areas comunes, paredes, bardas herreria en general, puertas, ventanas, senales y avisos.">
            Todo Limpieza en areas comunes, paredes, bardas herreria en general, puertas, ventanas, senales y avisos.
        </td>
    </tr> <tr>
        <td> <br>

            <input type="checkbox" name="val5[]" value="Todo Limpieza de dispensarios por el exterior, mangueras y pistolas de despacho.">
            Todo Limpieza de dispensarios por el exterior, mangueras y pistolas de despacho.
        </td>
    </tr>
    <tr>
        <td> <br>

            <input type="checkbox" name="val5[]" value="Limpieza de sanitarios, paredes, muebles de baño, espejos y piso.">
            Limpieza de sanitarios, paredes, muebles de baño, espejos y piso.
        </td>
    </tr>
    <tr>
        <td> <br>
            <input type="checkbox" name="val5[]" value="Verificacion de los registros y tuberias.">
            Verificacion de los registros y tuberias.
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