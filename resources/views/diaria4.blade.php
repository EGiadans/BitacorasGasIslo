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
    <title>Bitacora Diraria 4</title>
</head>

<body>
<form action="{{url('diaria/op4/success')}}" method="GET">


    <fieldset>
        <legend> <h4 style= "color:black"> Bitacora Diaria </h4></legend>
        <h2 style= "color:black"> 4&deg; Incidentes e Inspecciones </h2>

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
            &nbsp&nbsp&nbsp Hubo Incidentes:
        </td>
    </tr>
    <tr>
        <td>
            <input type="radio" name="rdOption" id="myCheck"  onclick="myFunction()" value="Si Hubo">SI&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <input type="radio" name="rdOption" id="myCheck"  onclick="myFunction()" value="No Hubo">NO
    </tr>
</table>

    <br>
    <br>

    <table id="text" style="display:none">
        <tr>
            <td>
                <input type="checkbox" name="op4[]" value="Terceros">Terceros
            </td>
        </tr>

        <tr>
            <td>
                <input type="checkbox" name="op4[]" value="Municipales">Municipales
            </td>
        </tr>

        <tr>
            <td>
                <input type="checkbox" name="op4[]" value="Estatales">Estatales
            </td>
        </tr>

        <tr>
            <td>
                <input type="checkbox" name="op4[]" value="Federales">Federales
            </td>
        </tr>

        <tr>
            <td > <br>Especifique Quien:  <textarea rows="1" cols="40" name="txtQuien"></textarea></td>
        </tr>
        <tr>
            <td > <br><br>
                Describir incidente: <textarea rows="1" cols="40" name="txtInc"></textarea>  <br></td>
        </tr>


    </table>

<div align="right"> <br><br><br><br>
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



</body>
</html>
