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

    public function month() {

        return view('month');
    }

    public function triMonth() {

        return view('triMonth');
    }


    public function sixMonth() {

        return view('sixMonth');
    }

    public function year() {

        return view('year');
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

            session(['globalEst' => $estacion]);



            $bitacora->save();

            session(['globalId' => $bitacora->ID_Bitacora]); //Id A.I. saved as global variable

            if ($option == 'day') {
                return redirect('/diaria');

            } else if ($option == 'week') {
                //return view('week');
                return redirect('/week');

            } else if ($option == 'month') {
                return redirect('/month');

            } else if ($option == 'threeM') {
                return redirect('/triMonth');

            } else if ($option == 'sixM') {
                return redirect('/sixMonth');

            } else if ($option == 'year') {
                return redirect('/year');

            } else {
                return view('dailyB');
            }
        //}

    }

    //Method used in daily 1 for testing, should be used on weekly
    public function saver1(Request $request) {
        $var = $request['btnOption'];
        $texto = $request['txtAct'];
        if ($var == 'Guardar') {
            //echo $texto;
            //echo session('globalDate');
            //echo session('globalId');
            //Save the value from $texto variable
            $idBit = session('globalId');
            $responsable = $request['selectResp'];
            $ejecuta = $request['selectEje'];

            $dato = new Dato;

            $dato->ID_Bitacora = $idBit;
            $dato->ID_Formato = '1F';

            /*$nombre = DB::table('campos_particulares')
                ->join('formato_bitacora','formato_bitacora.ID_Particular', '=', 'campos_particulares.ID_Particular')
                ->where('formato_bitacora.ID_Formato','1F')
                ->value('Nombre_Campo');
            */
            $nombre = 'Descricion de las actividades de operacion y mantenimiento realizadas: ';
            $dato->Nombre_Campo = $nombre;
            $dato->Valor = $texto;
            $dato->responsable = $responsable;
            $dato->ejecuta = $ejecuta;

            $dato->save();
            echo 'guardado';

            //should go back to dailyB


        } elseif ($var == 'Regresar') {
            echo 'regresar';
            //Cambiar el metodo diaria para recibir como parametros los valores de la sesion
            //como fecha, estacion y gerente
            //should go back to dailyB
            return redirect('/diaria');
        }
    }

    //This method should receive the selected values of week Bitacora and save them into the database
    //Bug: not displaying alert msg
    public function saveWeek(Request $request) {
        $vars = $request['weekOp'];//Here we receive the array with the activities selected
        $alt = $request['btnWeek'];//Here is the option for saving or cancelling
        $responsable = $request['selectResp'];
        $ejecuta = $request['selectEje'];

        $globalEst = session('globalEst');

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
            $idBitac = session('globalId');
            DB::table($globalEst)->insert(
                ['id_bitacora' => $idBitac]
            );

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
            $globalEst = session('globalEst');
            $idBitac = session('globalId');
            DB::table($globalEst)->insert(
                ['id_bitacora' => $idBitac]
            );


            //Deberiamos eliminar aqui los registros de la tabla datos con el globalId
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

            DB::table('datos')
                ->where('ID_Bitacora',$id)
                ->delete();

        }
        session(['globalDate' => '']);
        session(['globalType' => '']);
        session(['globalId' => '']);

        return redirect('/');
    }

    public function imprimir(Request $request) {
        //We receive this values from the Start view
        $option = $request['selectBit'];
        $date = $request['selectDate'];
        $estacion = $request['selectEst'];
        $idEst = DB::table('estaciones')
            ->where('Nombre',$estacion)
            ->value('ID_Estacion');


        if ($option == 'day'){
            $id = DB::table('bitacoras')
                ->where([
                    ['Fecha',$date],
                    ['Nombre_Bitacora',$option],
                    ['ID_estacion',$idEst],
                ])->value('ID_Bitacora');
            $datos = DB::table('datos')
                ->where('ID_Bitacora',$id)
                ->get();
            return $this->imprimirDiaria($datos);

        } else {
            //With those values we look for the corresponding bitacora and return its id
            $id = DB::table('bitacoras')
                ->where([
                    ['Fecha',$date],
                    ['Nombre_Bitacora',$option],
                    ['ID_estacion',$idEst],
                ])->value('ID_Bitacora');

            //Retrieve the rows of the table DATOS that belong to the previous id
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

    }

    public function vistaImprimir($datos){
        return View::make('imprimir')->with('data', $datos);
    }

    public function imprimirDiaria($datos){
        return View::make('imprimirDiaria')->with('data', $datos);
    }

    public function saver3(Request $request) {
        $var = $request['btnOption'];
        $texto = $request['txtAct'];
        if ($var == 'Guardar') {
            //echo $texto;
            //echo session('globalDate');
            //echo session('globalId');
            //Save the value from $texto variable
            $idBit = session('globalId');
            $responsable = $request['selectResp'];//Se obtienen directamente en la vista de cada op#
            $ejecuta = $request['selectEje'];

            $dato = new Dato;

            $dato->ID_Bitacora = $idBit;
            $dato->ID_Formato = '6F';

            $nombre = DB::table('campos_particulares')
                ->join('formato_bitacora','formato_bitacora.ID_Particular', '=', 'campos_particulares.ID_Particular')
                ->where('formato_bitacora.ID_Formato','6F')
                ->value('Nombre_Campo');

            $dato->Nombre_Campo = $nombre;
            $dato->Valor = $texto;
            $dato->responsable = $responsable;
            $dato->ejecuta = $ejecuta;

            $dato->save();
            echo 'guardado';

            //should go back to dailyB


        } elseif ($var == 'Regresar') {
            echo 'regresar';

            //should go back to dailyB
            return redirect('/diaria');
        }
        return redirect('/diaria');
    }

    public function saver5(Request $request) {
        $var = $request['btnOption'];
        $texto = $request['txtAct'];
        if ($var == 'Guardar') {
            //echo $texto;
            //echo session('globalDate');
            //echo session('globalId');
            //Save the value from $texto variable
            $idBit = session('globalId');
            $responsable = $request['selectResp'];
            $ejecuta = $request['selectEje'];

            $dato = new Dato;

            $dato->ID_Bitacora = $idBit;
            $dato->ID_Formato = '11F';

            $nombre = 'Descripcion Mantenimiento Diario';

            $dato->Nombre_Campo = $nombre;
            $dato->Valor = $texto;
            $dato->responsable = $responsable;
            $dato->ejecuta = $ejecuta;

            $dato->save();
            //echo $texto;

            $actividades = $request['val5'];
            //Recibiremos el array de actividades realizadas, como si fuera una week y las guardaremos del mismo modo,
            foreach ($actividades as $actividad) {
                //echo $option;
                $idBit = session('globalId');
                $dato = new Dato;

                $dato->ID_Bitacora = $idBit;
                $dato->ID_Formato = '12F';

                $dato->Nombre_Campo = $actividad;
                $dato->Valor = 'Si';
                $dato->responsable = $responsable;
                $dato->ejecuta = $ejecuta;



                $dato->save();
                //echo $actividad;
            }
            echo 'guardado';

            //should go back to dailyB


        } elseif ($var == 'Regresar') {
            echo 'regresar';

            //should go back to dailyB
            return redirect('/diaria');
        }
        return redirect('/diaria');
    }

    public function saver6(Request $request) {
        $var = $request['btnOption'];
        $radio = $request['rdOption'];
        $cantidad = $request['txtCantidad'];
        if ($var == 'Guardar') {
            if ($radio == 'Si Hubo'){
                //echo $texto;
                //echo session('globalDate');
                //echo session('globalId');
                //Save the value from $texto variable
                $idBit = session('globalId');
                $responsable = $request['selectResp'];
                $ejecuta = $request['selectEje'];

                $dato = new Dato; //We need to save if the user selected Si or No for Derrames

                $dato->ID_Bitacora = $idBit;
                $dato->ID_Formato = '13F';

                $dato->Nombre_Campo = 'Derrames:';
                $dato->Valor = $radio;
                $dato->responsable = $responsable;
                $dato->ejecuta = $ejecuta;

                $dato->save();

                $dato2 = new Dato;

                $dato2->ID_Bitacora = $idBit;
                $dato2->ID_Formato = '14F';

                $dato2->Nombre_Campo = 'Cantidad Derramada:';
                $dato2->Valor = $cantidad;
                $dato2->responsable = $responsable;
                $dato2->ejecuta = $ejecuta;

                $dato2->save();



                echo 'guardado';

                //should go back to dailyB
            } elseif ($radio == 'No Hubo') {
                $idBit = session('globalId');
                $responsable = $request['selectResp'];
                $ejecuta = $request['selectEje'];

                $dato = new Dato; //We need to save if the user selected Si or No for Derrames

                $dato->ID_Bitacora = $idBit;
                $dato->ID_Formato = '13F';

                $dato->Nombre_Campo = 'Derrames:';
                $dato->Valor = $radio;
                $dato->responsable = $responsable;
                $dato->ejecuta = $ejecuta;

                $dato->save();

            }



        } elseif ($var == 'Regresar') {
            echo 'regresar';

            //should go back to dailyB
            return redirect('/diaria');
        }
        return redirect('/diaria');
    }

    public function saver7(Request $request) {
        $var = $request['btnOption'];
        $texto = $request['txtAct'];
        if ($var == 'Guardar') {
            //echo $texto;
            //echo session('globalDate');
            //echo session('globalId');
            //Save the value from $texto variable
            $idBit = session('globalId');
            $responsable = $request['selectResp'];
            $ejecuta = $request['selectEje'];

            $actividades = $request['op7'];
            //Recibiremos el array de actividades realizadas, como si fuera una week y las guardaremos del mismo modo,
            foreach ($actividades as $actividad) {
                //echo $option;
                $idBit = session('globalId');
                $dato = new Dato;

                $dato->ID_Bitacora = $idBit;
                $dato->ID_Formato = '15F';

                $dato->Nombre_Campo = $actividad;
                $dato->Valor = 'Si';
                $dato->responsable = $responsable;
                $dato->ejecuta = $ejecuta;



                $dato->save();
                //echo $actividad;
            }
            echo 'guardado';

            //should go back to dailyB


        } elseif ($var == 'Regresar') {
            echo 'regresar';

            //should go back to dailyB
            return redirect('/diaria');
        }
        return redirect('/diaria');
    }

    public function saver2(Request $request) {
        $var = $request['btnOption'];
        $radio = $request['rdOption'];

        if ($var == 'Guardar') {

            $idBit = session('globalId');
            $responsable = $request['selectResp'];
            $ejecuta = $request['selectEje'];

            $dato = new Dato; //We need to save if the user selected Si or No for Derrames

            $cantidad = $request['txtCnt'];

            $dato->ID_Bitacora = $idBit;
            $dato->ID_Formato = '2F';
            $dato->Nombre_Campo = 'Cantidad recibida en Litros:';
            $dato->Valor =  $cantidad;

            $dato->responsable = $responsable;
            $dato->ejecuta = $ejecuta;

            $dato->save();


            $idBit = session('globalId');
            $responsable = $request['selectResp'];
            $ejecuta = $request['selectEje'];

            $dato2 = new Dato; //We need to save if the user selected Si or No for Derrames

            $factura = $request['txtFact'];

            $dato2->ID_Bitacora = $idBit;
            $dato2->ID_Formato = '112F';
            $dato2->Nombre_Campo = 'Numero de Factura:';
            $dato2->Valor =  $factura;

            $dato2->responsable = $responsable;
            $dato2->ejecuta = $ejecuta;

            $dato2->save();


            $idBit = session('globalId');
            $responsable = $request['selectResp'];
            $ejecuta = $request['selectEje'];

            $dato3 = new Dato; //We need to save if the user selected Si or No for Derrames

            $tirilla = $request['txtTir'];

            $dato3->ID_Bitacora = $idBit;
            $dato3->ID_Formato = '3F';
            $dato3->Nombre_Campo = 'Tirilla en Litros:';
            $dato3->Valor =  $tirilla;

            $dato3->responsable = $responsable;
            $dato3->ejecuta = $ejecuta;

            $dato3->save();


            $idBit = session('globalId');
            $responsable = $request['selectResp'];
            $ejecuta = $request['selectEje'];

            $dato4 = new Dato; //We need to save if the user selected Si or No for Derrames


            $descarga = $request['txtDesc'];

            $dato4->ID_Bitacora = $idBit;
            $dato4->ID_Formato = '4F';
            $dato4->Nombre_Campo = 'Cantidad descargada en litros:';
            $dato4->Valor = $descarga;

            $dato4->responsable = $responsable;
            $dato4->ejecuta = $ejecuta;

            $dato4->save();


            $idBit = session('globalId');
            $responsable = $request['selectResp'];
            $ejecuta = $request['selectEje'];

            $dato5 = new Dato; //We need to save if the user selected Si or No for Derrames

            $medicion = $request['txtMed'];

            $dato5->ID_Bitacora = $idBit;
            $dato5->ID_Formato = '5F';
            $dato5->Nombre_Campo = 'Medicion Regla en Litros:';
            $dato5->Valor =  $descarga;

            $dato5->responsable = $responsable;
            $dato5->ejecuta = $ejecuta;

            $dato5->save();

            if ($radio == 'Si Hubo'){

                $idBit = session('globalId');
                $responsable = $request['selectResp'];
                $ejecuta = $request['selectEje'];

                $data = new Dato; //We need to save if the user selected Si or No for Derrames

                $data->ID_Bitacora = $idBit;
                $data->ID_Formato = '118F';
                $data->Nombre_Campo = 'Carga Adicional:';
                $data->Valor = 'Si hubo';

                $data->responsable = $responsable;
                $data->ejecuta = $ejecuta;

                $data->save();


                $idBit = session('globalId');
                $responsable = $request['selectResp'];
                $ejecuta = $request['selectEje'];

                $dato = new Dato; //We need to save if the user selected Si or No for Derrames

                $cantidad = $request['txtCntAd'];

                $dato->ID_Bitacora = $idBit;
                $dato->ID_Formato = '113F';
                $dato->Nombre_Campo = 'Cantidad recibida en Litros (Adicional)';
                $dato->Valor =  $cantidad;

                $dato->responsable = $responsable;
                $dato->ejecuta = $ejecuta;

                $dato->save();


                $idBit = session('globalId');
                $responsable = $request['selectResp'];
                $ejecuta = $request['selectEje'];

                $dato2 = new Dato; //We need to save if the user selected Si or No for Derrames

                $factura = $request['txtFactAd'];

                $dato2->ID_Bitacora = $idBit;
                $dato2->ID_Formato = '114F';
                $dato2->Nombre_Campo = 'Numero de Factura (Adicional):';
                $dato2->Valor =  $factura;

                $dato2->responsable = $responsable;
                $dato2->ejecuta = $ejecuta;

                $dato2->save();


                $idBit = session('globalId');
                $responsable = $request['selectResp'];
                $ejecuta = $request['selectEje'];

                $dato3 = new Dato; //We need to save if the user selected Si or No for Derrames

                $tirilla = $request['txtTirAd'];

                $dato3->ID_Bitacora = $idBit;
                $dato3->ID_Formato = '115F';
                $dato3->Nombre_Campo = 'Tirilla en litros (Adicional):';
                $dato3->Valor =  $tirilla;

                $dato3->responsable = $responsable;
                $dato3->ejecuta = $ejecuta;

                $dato3->save();


                $idBit = session('globalId');
                $responsable = $request['selectResp'];
                $ejecuta = $request['selectEje'];

                $dato4 = new Dato; //We need to save if the user selected Si or No for Derrames

                $descarga = $request['txtDescAd'];

                $dato4->ID_Bitacora = $idBit;
                $dato4->ID_Formato = '116F';
                $dato4->Nombre_Campo = 'Cantidad descargada en litros (Adicional):';
                $dato4->Valor =  $descarga;

                $dato4->responsable = $responsable;
                $dato4->ejecuta = $ejecuta;

                $dato4->save();


                $idBit = session('globalId');
                $responsable = $request['selectResp'];
                $ejecuta = $request['selectEje'];

                $dato5 = new Dato; //We need to save if the user selected Si or No for Derrames

                $medicion = $request['txtMed'];

                $dato5->ID_Bitacora = $idBit;
                $dato5->ID_Formato = '117F';
                $dato5->Nombre_Campo = 'Medicion regla en litros  (Adicional):';
                $dato5->Valor =  $descarga;

                $dato5->responsable = $responsable;
                $dato5->ejecuta = $ejecuta;

                $dato5->save();

                //should go back to dailyB
            } elseif ($radio == 'No Hubo') {
                $idBit = session('globalId');
                $responsable = $request['selectResp'];
                $ejecuta = $request['selectEje'];

                $dato = new Dato;

                $dato->ID_Bitacora = $idBit;
                $dato->ID_Formato = '118F';
                $dato->Nombre_Campo = 'Carga Adicional:';
                $dato->Valor = 'No hubo';

                $dato->responsable = $responsable;
                $dato->ejecuta = $ejecuta;

                $dato->save();
            }



        } elseif ($var == 'Regresar') {
            echo 'regresar';

            //should go back to dailyB

        }
        return redirect('/diaria');

    }

    public function saver8(Request $request) {
        $var = $request['btnOption'];
        $radio = $request['rdOption'];

        if ($var == 'Guardar') {
            if ($radio == 'Si Hubo'){
                //echo $texto;
                //echo session('globalDate');
                //echo session('globalId');
                //Save the value from $texto variable
                $idBit = session('globalId');
                $responsable = $request['selectResp'];
                $ejecuta = $request['selectEje'];

                $dato = new Dato; //We need to save if the user selected Si or No for Derrames

                $txtFecha = $request['txtDate'];

                $dato->ID_Bitacora = $idBit;
                $dato->ID_Formato = '16F';
                $dato->Nombre_Campo = 'Fecha:';
                $dato->Valor = $txtFecha;

                $dato->responsable = $responsable;
                $dato->ejecuta = $ejecuta;


                $dato->save();

                $dato2 = new Dato;
                $txtHora = $request['txtTime'];

                $dato2->ID_Bitacora = $idBit;
                $dato2->ID_Formato = '17F';
                $dato2->Nombre_Campo = 'Hora:';
                $dato2->Valor = $txtHora;

                $dato2->responsable = $responsable;
                $dato2->ejecuta = $ejecuta;

                $dato2->save();

                $dato3 = new Dato;
                $queja = $request['txtQueja'];

                $dato3->ID_Bitacora = $idBit;
                $dato3->ID_Formato = '18F';
                $dato3->Nombre_Campo = 'Queja o Sugerencia:';
                $dato3->Valor = $queja;

                $dato3->responsable = $responsable;
                $dato3->ejecuta = $ejecuta;

                $dato3->save();


                $dato4 = new Dato;
                $act = $request['txtAct'];

                $dato4->ID_Bitacora = $idBit;
                $dato4->ID_Formato = '19F';
                $dato4->Nombre_Campo = 'Actividad Realizada:';
                $dato4->Valor = $act;

                $dato4->responsable = $responsable;
                $dato4->ejecuta = $ejecuta;

                $dato4->save();

                $dato5 = new Dato;
                $med = $request['txtMed'];

                $dato5->ID_Bitacora = $idBit;
                $dato5->ID_Formato = '20F';
                $dato5->Nombre_Campo = 'Medida Tomada:';
                $dato5->Valor = $med;

                $dato5->responsable = $responsable;
                $dato5->ejecuta = $ejecuta;

                $dato5->save();

                echo 'guardado';

                //should go back to dailyB
            } elseif ($radio == 'No Hubo') {
                $idBit = session('globalId');
                $responsable = $request['selectResp'];
                $ejecuta = $request['selectEje'];

                $dato = new Dato;
                $queja = $request['txtQueja'];

                $dato->ID_Bitacora = $idBit;
                $dato->ID_Formato = '18F';
                $dato->Nombre_Campo = 'Queja o Sugerencia:';
                $dato->Valor = 'No hubo';

                $dato->responsable = $responsable;
                $dato->ejecuta = $ejecuta;

                $dato->save();
            }



        } elseif ($var == 'Regresar') {
            echo 'regresar';

            //should go back to dailyB

        }
        return redirect('/diaria');
    }

    public function saver4(Request $request) {
        $var = $request['btnOption'];
        $texto = $request['txtAct'];
        $radio = $request['rdOption'];
        if ($var == 'Guardar') {
            if ($radio == 'Si Hubo') {

                $idBit = session('globalId');
                $responsable = $request['selectResp'];
                $ejecuta = $request['selectEje'];

                $dato = new Dato;

                $dato->ID_Bitacora = $idBit;
                $dato->ID_Formato = '7F';
                $dato->Nombre_Campo = 'Hubo Incidente:';
                $dato->Valor = 'Si hubo';

                $dato->responsable = $responsable;
                $dato->ejecuta = $ejecuta;

                $dato->save();


                $actividades = $request['op4'];
                //Recibiremos el array de actividades realizadas, como si fuera una week y las guardaremos del mismo modo,
                foreach ($actividades as $actividad) {
                    //echo $option;
                    $idBit = session('globalId');
                    $dato1 = new Dato;

                    $dato1->ID_Bitacora = $idBit;
                    $dato1->ID_Formato = '8F';
                    $dato1->Nombre_Campo = $actividad;
                    $dato1->Valor = 'Si';

                    $dato1->responsable = $responsable;
                    $dato1->ejecuta = $ejecuta;

                    $dato1->save();
                    //echo $actividad;
                }

                //Guardar el resto de campos
                $idBit = session('globalId');
                $responsable = $request['selectResp'];
                $ejecuta = $request['selectEje'];

                $dato2 = new Dato;
                $quien = $request['txtQuien'];

                $dato2->ID_Bitacora = $idBit;
                $dato2->ID_Formato = '9F';
                $dato2->Nombre_Campo = 'Especifique quien:';
                $dato2->Valor = $quien;

                $dato2->responsable = $responsable;
                $dato2->ejecuta = $ejecuta;

                $dato2->save();


                $idBit = session('globalId');
                $responsable = $request['selectResp'];
                $ejecuta = $request['selectEje'];

                $dato3 = new Dato;
                $inci = $request['txtInc'];

                $dato3->ID_Bitacora = $idBit;
                $dato3->ID_Formato = '10F';
                $dato3->Nombre_Campo = 'Especifique quien:';
                $dato3->Valor = $inci;

                $dato3->responsable = $responsable;
                $dato3->ejecuta = $ejecuta;

                $dato3->save();


                //should go back to dailyB

            } elseif ($radio == 'No Hubo') {
                $idBit = session('globalId');
                $responsable = $request['selectResp'];
                $ejecuta = $request['selectEje'];

                $dato = new Dato;

                $dato->ID_Bitacora = $idBit;
                $dato->ID_Formato = '7F';
                $dato->Nombre_Campo = 'Hubo Incidente:';
                $dato->Valor = 'No hubo';

                $dato->responsable = $responsable;
                $dato->ejecuta = $ejecuta;

                $dato->save();
            }



        } elseif ($var == 'Regresar') {
            echo 'regresar';

            //should go back to dailyB

        }
        return redirect('/diaria');

    }


}
