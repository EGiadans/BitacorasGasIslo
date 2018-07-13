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
    <title>Bitacora Diraria 8</title>
</head>

<body>

<form action="{{url('diaria/op8/success')}}" method="GET">


    <fieldset>
        <legend> <h4 style= "color:black"> Bitacora Diaria </h4></legend>
        <h2 style= "color:black"> 8&deg; Registro de Derrames de Hidrocarburos </h2>

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
            &nbsp&nbsp&nbsp Hubo Quejas o Sugerencias:
        </td>
    </tr>
    <tr>
        <td>
            <input type="radio" name="rdOption" id="myCheck"  onclick="myFunction()" value="Si Hubo">SI&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <input type="radio" name="rdOption" id="myCheck"  onclick="myFunction()" value="No Hubo">NO
    </tr>

    <table style="display:none" id="text">

        <tr>
            <td><br>
                Fecha:&nbsp <input id="date" type="date" name="txtDate">
                &nbsp&nbsp&nbsp Hora:&nbsp<input type="time" name="txtTime">
            </td>
        </tr>
        <tr><br>
            <td>
                <br> &nbsp&nbsp&nbsp  Queja o Sugerencia:  <br> &nbsp&nbsp&nbsp  <textarea name="txtQueja" cols=30 rows=4> </textarea>
            </td>
        </tr>
        <tr><br>
            <td>
                <br> &nbsp&nbsp&nbsp Actividad Realizada en el momento: &nbsp <input type="text" name="txtAct" size="30" maxlength="60" value="">
            </td>
        </tr>

        <tr>
            <td > <br><br>
                &nbsp&nbsp&nbsp   Medida Tomada para que no vuelva a pasar: <textarea name="txtMed" cols=80 rows=5> </textarea>  <br></td>
        </tr>
    </table>

</table>

<div align="right"> <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <input type ="submit" class="btn-secondary" name="btnOption" value="Guardar">
    <input type="submit" class="btn-secondary" name="btnOption" value="Regresar">
</div>


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


</form>

</body>
</html>