<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use DB;
use App\Quotation;
use Session;

class EvaluationItemController extends Controller
{
      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    private function getCalificaciones(){
        $calificaciones = array();
        array_push($calificaciones, array(10, 'Mal'));
        array_push($calificaciones, array(40, 'Regular'));
        array_push($calificaciones, array(70, 'Bien'));
        array_push($calificaciones, array(100, 'Muy Bien'));
        return $calificaciones;
    }
    public function get(Request $request)
    {
        //$value = session('key');
        // Store a piece of data in the session...
        session(['user_name' => '625353']);
        //$data = $request->session()->all();
        //$request->session()->forget('key');
        //$request->session()->flush();
        //var_dump($data);
        $operation = 'I';
        $status = 1;
        $results = array();
        $weight = array();
        $idproject = Input::get('project', 0);
        $existUser = $request->session()->has('user_name');
        if($idproject > 0 && $existUser == 2){
            $username = session('user_name');
            //validar existencia de matriz
            $exist = self::getCountMatriz($idproject);
            if($exist >= 3){
                $status = 0;
            }
            //generar peso de los indicadores
            $weight = self::generateWeight($idproject);
            // consultar proyecto
            $results = DB::select('SELECT valor, atributoCalidad_idatributoCalidad,evaluacion_idevaluacion FROM calificacion where evaluacion_idevaluacion=? and usuario_codigo=? order by atributoCalidad_idatributoCalidad', array(1001, $username));
            if(count($results) >= 7){
                $operation = 'U';
            }
        }
        
        return view('evaluacion-reg-calificacion')
        ->with('operation', $operation)->with('calificaciones', self::getCalificaciones())
        ->with('values', $results)->with('status', $status)
        ->with('weight', $weight)->with('idproject', $idproject);
    }
    public function operation(Request $request)
    {
        $operation = Input::get('operation', 'N');
        $idproject = Input::get('idproject', 0);
        $username = session('user_name');
        $input = $request->all();
        var_dump("mensaje del debug: ");
        var_dump($input);
        if($operation == 'I'){
            DB::table('calificacion')->insert(
                ['valor' => Input::get('valor1', 0), 'atributoCalidad_idatributoCalidad' => 1, 
                'usuario_codigo' => $username, 'evaluacion_idevaluacion' => $idproject, 'fecha' => '2018/12/31', 'actualizacion' => '2018/12/31']
            );
        }elseif($operation == 'U'){

        }
        //guardar evaluación

        return redirect()->route('evaluacion-calificacion', ['project' => 1001,'res_val' => 0]);
    }
    private function getCountMatriz($idproject){
        $results = DB::select('select IFNULL(count(distinct usuario_codigo),0) num from matriz where evaluacion_idevaluacion=?;', array($idproject));
        return $results[0]->num;
    }
    private function generateWeight($idproject){
        $results = DB::select('select IFNULL(count(distinct usuario_codigo),0) num from matriz where evaluacion_idevaluacion=?;', array($idproject));

        $r = array();
        array_push($r, 0.5);
        array_push($r, 0.95);
        array_push($r, 0.85);
        array_push($r, 0.63);
        array_push($r, 0.025);
        array_push($r, 0.46);
        array_push($r, 0.54);
        return $r;
    }
}
