<html>

<head>
    <meta charset="UTF-8">
    <title>sample</title>

    <style>
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
        }

        li {
            float: left;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover:not(.active) {
            background-color: #111;
        }

        .active {
            background-color:#FF5733  ;
        }
        body {
            font: 13px/20px 'Lucida Grande', Tahoma, Verdana, sans-serif;
            color: #404040;
            background-color: #ccffcc;
            text-align: center;
        }
        p{
            margin-left: 2em;
        }
        input[type=text], input[type=select], input[type=textarea]{
            margin: 5px;
            padding: 0 10px;
            width: 200px;
            height: 34px;
            color: #404040;
            background: white;
            border: 1px solid;
            border-color: #c4c4c4 #d1d1d1 #d4d4d4;
            border-radius: 2px;
            outline: 5px solid #eff4f7;
            text-align: center;
            -moz-outline-radius: 3px;

        }
        .container{
            background-color: white;
            margin: 80px auto;
            border: 2px solid transparent;
            border-radius: 25px;
            width: 640px;
        }
        .menu{
            position: relative;
            top: -2em;
            left: 20em;
            padding: 0 18px;
            height: 29px;
            font-size: 12px;
            font-weight: bold;
            color: #527881;
            text-shadow: 0 1px #e3f1f1;
            background: #cde5ef;
            border: 1px solid;
            border-color: #b4ccce #b3c0c8 #9eb9c2;
            border-radius: 16px;
            outline: 0;

        }
        input[type=submit] {
            position: relative;
            top: 1.5em;
            padding: 0 18px;
            height: 29px;
            font-size: 12px;
            font-weight: bold;
            color: white;
            text-shadow: 0 1px black;
            background: #FF5733;
            border: 1px solid;
            border-color: #b4ccce #b3c0c8 #9eb9c2;
            border-radius: 16px;
            outline: 0;
        }
    </style>



</head>
<body>
<div class="container">
    <form action="{{url('dailyBit/op1/success')}}" method="GET">
    <p>
    <h1>1° Operacion y Mantenimiento Preventivo</h1>
    <h2>Estacion de servicio ######</h2>
    <h2>Gerente#####</h2>
    <h3>Personal que ejecuta  Unidad: <select name="unidad">
            <option value="pieza">1</option>
            <option value="litros"> 2 </option>
            <option value="Galones"> 3 </option>
            <option value="metros"> 4 </option>
        </select> <br></h3>
    Todo lo referente a las actividades de operacion y los mantenimientos que se realicen. AQUI INCLUYE TRABAJOS EN ALTURA Y EN CALIENTE, todos los trabajos peligrosos referentes a alturas y donde se maneje chispa abierta(fuego) Reportalo como tal.<br>
    <textarea rows="4" cols="50" name="txtAct"></textarea>
        <br>
        <input type ="submit" class="btn-secondary" name="btnOption" value="Guardar">
        <input type="submit" class="btn-secondary" name="btnOption" value="Regresar">

    </p>
    </form>
</div>

</body>
</html>