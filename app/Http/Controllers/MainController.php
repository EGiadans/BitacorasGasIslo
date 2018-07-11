<?php

namespace App\Http\Controllers;

use App\Bitacora;
use App\Dato;
use Illuminate\Http\Request;
use App\Gerente;
use View;
use Illuminate\Support\Facades\DB;


class MainController extends Controller
{

    public function inicio() {

        return view('start');
    }

    public function diaria() {
        return view('dailyB');
        //$date = session('globalDate');
        //return View::make('diaria')->with('fecha',$date);
    }

    public function semanal() {
        return view('week');
    }

    public function op1(){
        return view('diaria1');
    }

    public function op2(){
        return view('diaria2');
    }

    public function op3(){
        return view('diaria3');
    }

    public function op4() {
        return view('diaria4');
    }

    public function op5(){
        return view('diaria5');
    }

    public function op6(){
        return view('diaria6');
    }

    public function op7(){
        return view('diaria7');
    }

    public function op8(){
        return view('diaria8');
    }


    //Here we should check for the option selected at the main menu, an return the corresponding view
    //Bug: Using this method when trying to return to dailyB view from diaria1 ?
    public function validator(Request $request) {
        $option = $request['selectBit'];
        //$btn = $request['btnStart'];


        //if ($btn == 'Imprimir') {
         //   $this->imprimir($request);
        //} else {


            //Insertion on table Bitacoras for every kind of Bitacora
            $bitacora = new Bitacora;

            $bitacora->Nombre_Bitacora = $option;

            $date = $request['selectDate'];

            if ($date == null) {
                echo "<script type='text/javascript'>alert('Seleccione fecha');</script>"; //Message not displaying
                return redirect('/');
            }

            $bitacora->Fecha = $date;

            $gerente = $request['selectGer'];
            $idGerente = Gerente::where('nombre', $gerente)->value('id');
            $bitacora->ID_Gerente = $idGerente;

            $estacion = $request['selectEst'];
            $idEstacion = DB::table('estaciones')->where('Nombre', $estacion)->value('ID_Estacion');
            $bitacora->ID_Estacion = $idEstacion;

            $bitacora->Folio = $date; //CHECK THIS
            //
            session(['globalDate' => $date]); //Store date as global variable
            session(['globalType' => $option]); //Store tipoDeBitacora as global variable
            session(['globalGerente' => $gerente]);


            $bitacora->save();

            session(['globalId' => $bitacora->ID_Bitacora]); //Id A.I. saved as global variable

            if ($option == 'day') {
                return view('dailyB');
            } else if ($option == 'week') {
                return view('week');
            } else if ($option == 'month') {
                return view('month');
            } else if ($option == 'threeM') {
                return view('triMonth');
            } else if ($option == 'sixM') {
                return view('sixM');
            } else if ($option == 'year') {
                return view('year');
            } else {
                return view('dailyB');
            }
        //}

    }

    //Method used in daily 1 for testing, should be used on weekly
    public function saver(Request $request) {
        $option = $request['btnOption'];
        $texto = $request['txtAct'];
        if ($option == 'Guardar') {
            echo $texto;
            echo session('globalDate');
            echo session('globalId');
            //Save the value from $texto variable
        } elseif ($option == 'Regresar') {
            echo 'regresar';
            //Cambiar el metodo diaria para recibir como parametros los valores de la sesion
            //como fecha, estacion y gerente
        }
    }

    //This method should receive the selected values of week Bitacora and save them into the database
    //Bug: not displaying alert msg
    public function saveWeek(Request $request) {
        $vars = $request['weekOp'];//Here we receive the array with the activities selected
        $alt = $request['btnWeek'];//Here is the option for saving or cancelling
        $responsable = $request['selectResp'];
        $ejecuta = $request['selectEje'];

        if ($alt == 'Enviar') {
            if ($vars == null) {
                echo "<script type='text/javascript'>alert('No hay opciones seleccionadas');</script>";

                //Show confirmation msg
            } else {
                foreach ($vars as $option) {
                    //echo $option;
                    $idBit = session('globalId');
                    $dato = new Dato;

                    $dato->ID_Bitacora = $idBit;
                    $dato->ID_Formato = $option;

                    $nombre = DB::table('campos_particulares')
                        ->join('formato_bitacora','formato_bitacora.ID_Particular', '=', 'campos_particulares.ID_Particular')
                        ->where('formato_bitacora.ID_Formato',$option)
                        ->value('Nombre_Campo');

                    $dato->Nombre_Campo = $nombre;
                    $dato->Valor = 'Yes';
                    $dato->responsable = $responsable;
                    $dato->ejecuta = $ejecuta;

                    $dato->save();


                    //El id de la bitacora se obtiene con el valor de la fechaGlobsl y ademas el tipo de bitacora (Nombre)
                    //El nombre del campo se obtiene directamente de $option
                    //el valor del campo, al ser semanal(y todas las de periodo) sera yes (al querer desplegar todos los
                    //valores de una bitacora solicitada la condicion sera donde el valor sea yes)
                    //Here we must save the value of each option
                    //Then, show success message
                    $message = "Bitacora guardada satisfactoriamente";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                }
            }
            //Restart the vale of fechaGlobal;
            //$this->fechaGlobal = '';
            //Return to the main menu
            //return redirect('/');

        } elseif($alt == 'Cancelar') {
            //globalVariables stated in validator method
            $tipo = session('globalType');
            $fecha = session('globalDate');
            $id = session('globalId');

            DB::table('bitacoras')
                ->where([
                    ['Fecha',$fecha],
                    ['Nombre_Bitacora',$tipo],
                    ['ID_Bitacora',$id],
                ])->delete();
            //Redireccionar a Inicio
        }
        return redirect('/');
    }

    /*Method only for testing insertions
    public function test(Request $request) {
        $option = $request['selectBit'];

        if ($option == 'day') {
            return view('dailyB');
        } else if ($option == 'week') {
            return view('week');
        } else if ($option == 'month') {
            return view('month');
        } else if ($option == 'threeM') {
            return view('threeM');
        } else if ($option == 'sixM') {
            return view('sixM');
        } else if ($option == 'year') {
            return view('year');
        } else {
            return view('dailyB');
        }

        //Insertion on table Bitacoras
        //$bitacora = new Bitacora;

        //$bitacora->Nombre_Bitacora = $option;

        $date = $request['selectDate'];
        //$bitacora->Fecha =
        echo $date;

        $gerente = $request['selectGer'];
        $idGerente = Gerente::where('nombre',$gerente)->value('id');
        echo $idGerente;
        //
        $estacion = $request['selectEst'];
        //$idEstacion = Estacion::where('Nombre',$estacion)->get();
        $idEstacion = DB::table('estaciones')->where('Nombre',$estacion)->value('ID_Estacion');
        echo $idEstacion;

        $this->fechaGlobal = $date;
        echo $this->fechaGlobal;

    }
    */
    public function test(Request $request){
        $var = '21F';
        $campos = DB::table('campos_particulares')
            ->join('formato_bitacora','formato_bitacora.ID_Particular', '=', 'campos_particulares.ID_Particular')
            ->where('formato_bitacora.ID_Formato',$var)
            ->value('Nombre_Campo');

        echo $campos;


    }

    public function endDaily(Request $request) {
        $opcion = $request['btnDay'];
        if ($opcion == 'Enviar') {

        } elseif ($opcion == 'Cancelar') {
            $tipo = session('globalType');
            $fecha = session('globalDate');
            $id = session('globalId');

            DB::table('bitacoras')
                ->where([
                    ['Fecha',$fecha],
                    ['Nombre_Bitacora',$tipo],
                    ['ID_Bitacora',$id],
                ])->delete();

        }
        session(['globalDate' => '']);
        session(['globalType' => '']);
        session(['globalId' => '']);

        return redirect('/');
    }

    public function imprimir(Request $request) {
        $option = $request['selectBit'];
        $date = $request['selectDate'];

        $id = DB::table('bitacoras')
            ->where([
                ['Fecha',$date],
                ['Nombre_Bitacora',$option],
            ])->value('ID_Bitacora');

        $datos = DB::table('datos')
            ->where('ID_Bitacora',$id)
            ->get();

        /*
        foreach ($datos as $dato) {
            echo $dato->Nombre_Campo;
        }
        */
        return $this->vistaImprimir($datos);
    }

    public function vistaImprimir($datos){
        return View::make('imprimir')->with('data', $datos);
    }

}
