<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Services\SessionService;
use DB;
use App\Quotation;
use Session;

class EvaluationItemController extends Controller
{
    private $session;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->session = new SessionService();
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
        $session_user = $this->session->getSession();
        //$data = $request->session()->all();
        //var_dump($data);
        $operation = 'I';
        $status = 1;
        $results = array();
        $weight = array();
        $idproject = Input::get('project', 0);
        $numproject = Input::get('idproject', 0);
        if($idproject > 0 && $session_user->status != 0 ){
            $username = $session_user->code;
            //validar existencia de matriz
            $exist = self::getCountMatriz($idproject);
            if($exist >= 3){
                $status = 0;
            }
            //generar peso de los indicadores
            $weight = self::generateWeight($idproject);
            // consultar proyecto
            $results = DB::select('SELECT valor, atributoCalidad_idatributoCalidad,evaluacion_idevaluacion FROM calificacion where evaluacion_idevaluacion=? and usuario_codigo=? order by atributoCalidad_idatributoCalidad', array($idproject, $username));
            if(count($results) >= 7){
                $operation = 'U';
            }
        }

        return view('evaluacion-reg-calificacion')->with('session', $this->session->getSession())
        ->with('operation', $operation)->with('calificaciones', self::getCalificaciones())
        ->with('values', $results)->with('status', $status)
        ->with('weight', $weight)->with('idproject', $idproject)
        ->with('numproject', $numproject);
    }
    public function operation(Request $request)
    {
        $session_user = $this->session->getSession();
        $operation = Input::get('operation', 'N');
        $idproject = Input::get('idproject', 0);
        $numproject = Input::get('numproject', 0);
        $username = $session_user->code;
        $date_string = date("Y/m/d h:i");
        //guardar evaluación
        if($operation == 'I'){
            DB::table('calificacion')->insert([
                ['valor' => Input::get('valor1', 0), 'atributoCalidad_idatributoCalidad' => 1,
                'usuario_codigo' => $username, 'evaluacion_idevaluacion' => $idproject, 'fecha' => $date_string, 'actualizacion' => $date_string],
                ['valor' => Input::get('valor2', 0), 'atributoCalidad_idatributoCalidad' => 2,
                'usuario_codigo' => $username, 'evaluacion_idevaluacion' => $idproject, 'fecha' => $date_string, 'actualizacion' => $date_string],
                ['valor' => Input::get('valor3', 0), 'atributoCalidad_idatributoCalidad' => 3,
                'usuario_codigo' => $username, 'evaluacion_idevaluacion' => $idproject, 'fecha' => $date_string, 'actualizacion' => $date_string],
                ['valor' => Input::get('valor4', 0), 'atributoCalidad_idatributoCalidad' => 4,
                'usuario_codigo' => $username, 'evaluacion_idevaluacion' => $idproject, 'fecha' => $date_string, 'actualizacion' => $date_string],
                ['valor' => Input::get('valor5', 0), 'atributoCalidad_idatributoCalidad' => 5,
                'usuario_codigo' => $username, 'evaluacion_idevaluacion' => $idproject, 'fecha' => $date_string, 'actualizacion' => $date_string],
                ['valor' => Input::get('valor6', 0), 'atributoCalidad_idatributoCalidad' => 6,
                'usuario_codigo' => $username, 'evaluacion_idevaluacion' => $idproject, 'fecha' => $date_string, 'actualizacion' => $date_string],
                ['valor' => Input::get('valor7', 0), 'atributoCalidad_idatributoCalidad' => 7,
                'usuario_codigo' => $username, 'evaluacion_idevaluacion' => $idproject, 'fecha' => $date_string, 'actualizacion' => $date_string]
            ]);
        }elseif($operation == 'U'){
            DB::table('calificacion')
            ->where('evaluacion_idevaluacion', $idproject)
            ->where('usuario_codigo', $username)
            ->where('atributoCalidad_idatributoCalidad', 1)
            ->update(['valor' => Input::get('valor1', 0), 'actualizacion' => $date_string]);
            DB::table('calificacion')
            ->where('evaluacion_idevaluacion', $idproject)
            ->where('usuario_codigo', $username)
            ->where('atributoCalidad_idatributoCalidad', 2)
            ->update(['valor' => Input::get('valor2', 0), 'actualizacion' => $date_string]);
            DB::table('calificacion')
            ->where('evaluacion_idevaluacion', $idproject)
            ->where('usuario_codigo', $username)
            ->where('atributoCalidad_idatributoCalidad', 3)
            ->update(['valor' => Input::get('valor3', 0), 'actualizacion' => $date_string]);
            DB::table('calificacion')
            ->where('evaluacion_idevaluacion', $idproject)
            ->where('usuario_codigo', $username)
            ->where('atributoCalidad_idatributoCalidad', 4)
            ->update(['valor' => Input::get('valor4', 0), 'actualizacion' => $date_string]);
            DB::table('calificacion')
            ->where('evaluacion_idevaluacion', $idproject)
            ->where('usuario_codigo', $username)
            ->where('atributoCalidad_idatributoCalidad', 5)
            ->update(['valor' => Input::get('valor5', 0), 'actualizacion' => $date_string]);
            DB::table('calificacion')
            ->where('evaluacion_idevaluacion', $idproject)
            ->where('usuario_codigo', $username)
            ->where('atributoCalidad_idatributoCalidad', 6)
            ->update(['valor' => Input::get('valor6', 0), 'actualizacion' => $date_string]);
            DB::table('calificacion')
            ->where('evaluacion_idevaluacion', $idproject)
            ->where('usuario_codigo', $username)
            ->where('atributoCalidad_idatributoCalidad', 7)
            ->update(['valor' => Input::get('valor7', 0), 'actualizacion' => $date_string]);
        }
        // calculo del resultado
        $exist = self::getUsersMatriz($idproject);
        $exist_eval = self::getUsersEvaluation($idproject);
        if(count($exist) >= 3 && count($exist_eval) >= 3){
            self::calculateValue($idproject);
        }
        return redirect()->route('detalle-proyecto', ['proyectoid' => $numproject]);
        /*return view('evaluacion-reg-calificacion')->with('session', $session_user)
        ->with('operation', 'I')->with('calificaciones', self::getCalificaciones())
        ->with('values', array())->with('status', 0)
        ->with('weight', array())->with('idproject', $idproject)->with('numproject', $numproject);*/
    }
    public function getUsersEvaluation($idevaluation){
      $result   = DB::select('select distinct usuario_codigo as user from calificacion where evaluacion_idevaluacion=?', array($idevaluation));
      return $result;
    }
    public function getUsersMatriz($idproject){
        $results = DB::select('select distinct usuario_codigo as user from matriz where evaluacion_idevaluacion=?', array($idproject));
        return $results;
    }
    public function getCountMatriz($idproject){
        $results = DB::select('select IFNULL(count(distinct usuario_codigo),0) num from matriz where evaluacion_idevaluacion=?', array($idproject));
        return $results[0]->num;
    }
    private function getAverage($idproject, $username ){
        $results = DB::select('SELECT posX, AVG(valor/sum_item(evaluacion_idevaluacion,usuario_codigo,posY)) promedio FROM matriz where evaluacion_idevaluacion=? and usuario_codigo=? group by posX order by posX', array($idproject, $username));
        return $results;
    }
    private function generateWeight($idproject){
        $r = array();
        $users = DB::select('select distinct usuario_codigo from matriz where evaluacion_idevaluacion=?', array($idproject));
        if(count($users) >= 3){
            $user1 = self::getAverage($idproject, $users[0]->usuario_codigo);
            $user2 = self::getAverage($idproject, $users[1]->usuario_codigo);
            $user3 = self::getAverage($idproject, $users[2]->usuario_codigo);
            for ($x = 0; $x < 7; $x++) {
                $value = ($user1[$x]->promedio + $user2[$x]->promedio + $user3[$x]->promedio)/3;
                array_push($r,round($value,3));
            }
        }else{
            array_push($r, 0,0,0,0,0,0,0);
        }
        return $r;
    }
    private function getValuesEvaluacion($idproject){
        $results = DB::select('SELECT atributoCalidad_idatributoCalidad atributo, sum(valor)/3 promedio FROM calificacion where evaluacion_idevaluacion=? group by atributoCalidad_idatributoCalidad order by atributoCalidad_idatributoCalidad', array($idproject));
        return $results;
    }
    private function calculateValue($idproject){
        $average = self::getValuesEvaluacion($idproject);
        $weiht = self::generateWeight($idproject);
        $total = 0;
        for ($x = 0; $x < 7; $x++) {
            $val = $average[$x]->promedio * $weiht[$x];
            $total += $val;
        }
        DB::table('evaluacion')
            ->where('idevaluacion', $idproject)
            ->update(['resultado' => $total, 'actualizacion' => date("Y/m/d h:i")]);
    }
}
