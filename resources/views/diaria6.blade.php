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
    <title>Bitacora Diraria 6</title>
</head>

<body>
<form action="{{url('diaria/op6/success')}}" method="GET">


<fieldset>
    <legend> <h4 style= "color:black"> Bitacora Diaria </h4></legend>
    <h2 style= "color:black"> 6&deg; Registro de derrames de hidrocarburos </h2>

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
            &nbsp&nbsp&nbsp Hubo Derrames:
        </td>
    </tr>
    <tr>
        <td>
            &nbsp&nbsp&nbsp&nbsp
            <input type="radio" name="rdOption" id="myCheck"  onclick="myFunction()" value="Si Hubo">SI&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <input type="radio" name="rdOption" id="myCheck"  onclick="myFunction()" value="No Hubo">NO



    <tr id="text" style="display:none">
        <td>
            <br>
            <br>
            &nbsp&nbsp&nbsp Cantidad derramada: &nbsp <input type="text" id="text" size="30" maxlength="60" name="txtCantidad"><br>
        </td>
    </tr>
    </tr>
</table>

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

<div align="right"> <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <input type ="submit" class="btn-secondary" name="btnOption" value="Guardar">
    <input type="submit" class="btn-secondary" name="btnOption" value="Regresar">
</div>



</form>
</body>
</html>