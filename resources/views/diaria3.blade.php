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
    <title>Bitacora Diraria 3</title>
</head>

<body background="tela-crepe-muselina-verde-menta.jpg">
<form action="{{url('diaria/op3/success')}}">


<fieldset>
    <legend> <h4 style= "color:black"> Bitacora Diaria </h4></legend>
    <h2 style= "color:black"> 3&deg; Desviaci&oacute;n de Balance de Producto </h2>
    <h2 style= "color:black"> Persona que autoriza:</h2>
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
            &nbsp&nbsp&nbsp Escribe la diferencia en litros: &nbsp <input type="text" name="txtAct" size="30" maxlength="60">
        </td>
    </tr>
</table>

<div align="right"> <br><br><br><br><br><br><br><br><br><br>
    <input type ="submit" class="btn-secondary" name="btnOption" value="Guardar">
    <input type="submit" class="btn-secondary" name="btnOption" value="Regresar">
</div>



</form>
</body>
</html>