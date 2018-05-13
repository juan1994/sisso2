<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Services\SessionService;
use DB;
use App\Quotation;

class EvaluationController extends Controller
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

    public function get(Request $request)
    {
        session(['user_name' => '625353']);
        $idproject = Input::get('project', 0);
        return view('evaluacion-registrar')->with('session', $this->session->getSession())->with('status', 'C')
        ->with('idproject', $idproject)->with('operation', 'I');
    }
    public function operation(Request $request)
    {
        $operation = Input::get('operation', 'N');
        $idproject = Input::get('idproject', 0);
        $username = session('user_name');
        $date_string = date("Y/m/d h:i");
        //$input = $request->all();
        //var_dump($input);
        DB::table('matriz')->where('usuario_codigo', $username)->where('evaluacion_idevaluacion', $idproject)->delete();
        DB::table('matriz')->insert([
            ['valor' => Input::get('campo11', 0), 'posX' => 1, 'posY' => 1, 
            'usuario_codigo' => $username, 'evaluacion_idevaluacion' => $idproject, 'fecha' => $date_string, 'actualizacion' => $date_string],
            ['valor' => Input::get('campo12', 0), 'posX' => 1, 'posY' => 2, 
            'usuario_codigo' => $username, 'evaluacion_idevaluacion' => $idproject, 'fecha' => $date_string, 'actualizacion' => $date_string],
            ['valor' => Input::get('campo13', 0), 'posX' => 1, 'posY' => 3, 
            'usuario_codigo' => $username, 'evaluacion_idevaluacion' => $idproject, 'fecha' => $date_string, 'actualizacion' => $date_string],
            ['valor' => Input::get('campo14', 0), 'posX' => 1, 'posY' => 4, 
            'usuario_codigo' => $username, 'evaluacion_idevaluacion' => $idproject, 'fecha' => $date_string, 'actualizacion' => $date_string],
            ['valor' => Input::get('campo15', 0), 'posX' => 1, 'posY' => 5, 
            'usuario_codigo' => $username, 'evaluacion_idevaluacion' => $idproject, 'fecha' => $date_string, 'actualizacion' => $date_string],
            ['valor' => Input::get('campo16', 0), 'posX' => 1, 'posY' => 6, 
            'usuario_codigo' => $username, 'evaluacion_idevaluacion' => $idproject, 'fecha' => $date_string, 'actualizacion' => $date_string],
            ['valor' => Input::get('campo17', 0), 'posX' => 1, 'posY' => 7, 
            'usuario_codigo' => $username, 'evaluacion_idevaluacion' => $idproject, 'fecha' => $date_string, 'actualizacion' => $date_string],
            ['valor' => Input::get('campo21', 0), 'posX' => 2, 'posY' => 1, 
            'usuario_codigo' => $username, 'evaluacion_idevaluacion' => $idproject, 'fecha' => $date_string, 'actualizacion' => $date_string],
            ['valor' => Input::get('campo22', 0), 'posX' => 2, 'posY' => 2, 
            'usuario_codigo' => $username, 'evaluacion_idevaluacion' => $idproject, 'fecha' => $date_string, 'actualizacion' => $date_string],
            ['valor' => Input::get('campo23', 0), 'posX' => 2, 'posY' => 3, 
            'usuario_codigo' => $username, 'evaluacion_idevaluacion' => $idproject, 'fecha' => $date_string, 'actualizacion' => $date_string],
            ['valor' => Input::get('campo24', 0), 'posX' => 2, 'posY' => 4, 
            'usuario_codigo' => $username, 'evaluacion_idevaluacion' => $idproject, 'fecha' => $date_string, 'actualizacion' => $date_string],
            ['valor' => Input::get('campo25', 0), 'posX' => 2, 'posY' => 5, 
            'usuario_codigo' => $username, 'evaluacion_idevaluacion' => $idproject, 'fecha' => $date_string, 'actualizacion' => $date_string],
            ['valor' => Input::get('campo26', 0), 'posX' => 2, 'posY' => 6, 
            'usuario_codigo' => $username, 'evaluacion_idevaluacion' => $idproject, 'fecha' => $date_string, 'actualizacion' => $date_string],
            ['valor' => Input::get('campo27', 0), 'posX' => 2, 'posY' => 7, 
            'usuario_codigo' => $username, 'evaluacion_idevaluacion' => $idproject, 'fecha' => $date_string, 'actualizacion' => $date_string],
            ['valor' => Input::get('campo31', 0), 'posX' => 3, 'posY' => 1, 
            'usuario_codigo' => $username, 'evaluacion_idevaluacion' => $idproject, 'fecha' => $date_string, 'actualizacion' => $date_string],
            ['valor' => Input::get('campo32', 0), 'posX' => 3, 'posY' => 2, 
            'usuario_codigo' => $username, 'evaluacion_idevaluacion' => $idproject, 'fecha' => $date_string, 'actualizacion' => $date_string],
            ['valor' => Input::get('campo33', 0), 'posX' => 3, 'posY' => 3, 
            'usuario_codigo' => $username, 'evaluacion_idevaluacion' => $idproject, 'fecha' => $date_string, 'actualizacion' => $date_string],
            ['valor' => Input::get('campo34', 0), 'posX' => 3, 'posY' => 4, 
            'usuario_codigo' => $username, 'evaluacion_idevaluacion' => $idproject, 'fecha' => $date_string, 'actualizacion' => $date_string],
            ['valor' => Input::get('campo35', 0), 'posX' => 3, 'posY' => 5, 
            'usuario_codigo' => $username, 'evaluacion_idevaluacion' => $idproject, 'fecha' => $date_string, 'actualizacion' => $date_string],
            ['valor' => Input::get('campo36', 0), 'posX' => 3, 'posY' => 6, 
            'usuario_codigo' => $username, 'evaluacion_idevaluacion' => $idproject, 'fecha' => $date_string, 'actualizacion' => $date_string],
            ['valor' => Input::get('campo37', 0), 'posX' => 3, 'posY' => 7, 
            'usuario_codigo' => $username, 'evaluacion_idevaluacion' => $idproject, 'fecha' => $date_string, 'actualizacion' => $date_string],
            ['valor' => Input::get('campo41', 0), 'posX' => 4, 'posY' => 1, 
            'usuario_codigo' => $username, 'evaluacion_idevaluacion' => $idproject, 'fecha' => $date_string, 'actualizacion' => $date_string],
            ['valor' => Input::get('campo42', 0), 'posX' => 4, 'posY' => 2, 
            'usuario_codigo' => $username, 'evaluacion_idevaluacion' => $idproject, 'fecha' => $date_string, 'actualizacion' => $date_string],
            ['valor' => Input::get('campo43', 0), 'posX' => 4, 'posY' => 3, 
            'usuario_codigo' => $username, 'evaluacion_idevaluacion' => $idproject, 'fecha' => $date_string, 'actualizacion' => $date_string],
            ['valor' => Input::get('campo44', 0), 'posX' => 4, 'posY' => 4, 
            'usuario_codigo' => $username, 'evaluacion_idevaluacion' => $idproject, 'fecha' => $date_string, 'actualizacion' => $date_string],
            ['valor' => Input::get('campo45', 0), 'posX' => 4, 'posY' => 5, 
            'usuario_codigo' => $username, 'evaluacion_idevaluacion' => $idproject, 'fecha' => $date_string, 'actualizacion' => $date_string],
            ['valor' => Input::get('campo46', 0), 'posX' => 4, 'posY' => 6, 
            'usuario_codigo' => $username, 'evaluacion_idevaluacion' => $idproject, 'fecha' => $date_string, 'actualizacion' => $date_string],
            ['valor' => Input::get('campo47', 0), 'posX' => 4, 'posY' => 7, 
            'usuario_codigo' => $username, 'evaluacion_idevaluacion' => $idproject, 'fecha' => $date_string, 'actualizacion' => $date_string],
            ['valor' => Input::get('campo51', 0), 'posX' => 5, 'posY' => 1, 
            'usuario_codigo' => $username, 'evaluacion_idevaluacion' => $idproject, 'fecha' => $date_string, 'actualizacion' => $date_string],
            ['valor' => Input::get('campo52', 0), 'posX' => 5, 'posY' => 2, 
            'usuario_codigo' => $username, 'evaluacion_idevaluacion' => $idproject, 'fecha' => $date_string, 'actualizacion' => $date_string],
            ['valor' => Input::get('campo53', 0), 'posX' => 5, 'posY' => 3, 
            'usuario_codigo' => $username, 'evaluacion_idevaluacion' => $idproject, 'fecha' => $date_string, 'actualizacion' => $date_string],
            ['valor' => Input::get('campo54', 0), 'posX' => 5, 'posY' => 4, 
            'usuario_codigo' => $username, 'evaluacion_idevaluacion' => $idproject, 'fecha' => $date_string, 'actualizacion' => $date_string],
            ['valor' => Input::get('campo55', 0), 'posX' => 5, 'posY' => 5, 
            'usuario_codigo' => $username, 'evaluacion_idevaluacion' => $idproject, 'fecha' => $date_string, 'actualizacion' => $date_string],
            ['valor' => Input::get('campo56', 0), 'posX' => 5, 'posY' => 6, 
            'usuario_codigo' => $username, 'evaluacion_idevaluacion' => $idproject, 'fecha' => $date_string, 'actualizacion' => $date_string],
            ['valor' => Input::get('campo57', 0), 'posX' => 5, 'posY' => 7, 
            'usuario_codigo' => $username, 'evaluacion_idevaluacion' => $idproject, 'fecha' => $date_string, 'actualizacion' => $date_string],
            ['valor' => Input::get('campo61', 0), 'posX' => 6, 'posY' => 1, 
            'usuario_codigo' => $username, 'evaluacion_idevaluacion' => $idproject, 'fecha' => $date_string, 'actualizacion' => $date_string],
            ['valor' => Input::get('campo62', 0), 'posX' => 6, 'posY' => 2, 
            'usuario_codigo' => $username, 'evaluacion_idevaluacion' => $idproject, 'fecha' => $date_string, 'actualizacion' => $date_string],
            ['valor' => Input::get('campo63', 0), 'posX' => 6, 'posY' => 3, 
            'usuario_codigo' => $username, 'evaluacion_idevaluacion' => $idproject, 'fecha' => $date_string, 'actualizacion' => $date_string],
            ['valor' => Input::get('campo64', 0), 'posX' => 6, 'posY' => 4, 
            'usuario_codigo' => $username, 'evaluacion_idevaluacion' => $idproject, 'fecha' => $date_string, 'actualizacion' => $date_string],
            ['valor' => Input::get('campo65', 0), 'posX' => 6, 'posY' => 5, 
            'usuario_codigo' => $username, 'evaluacion_idevaluacion' => $idproject, 'fecha' => $date_string, 'actualizacion' => $date_string],
            ['valor' => Input::get('campo66', 0), 'posX' => 6, 'posY' => 6, 
            'usuario_codigo' => $username, 'evaluacion_idevaluacion' => $idproject, 'fecha' => $date_string, 'actualizacion' => $date_string],
            ['valor' => Input::get('campo67', 0), 'posX' => 6, 'posY' => 7, 
            'usuario_codigo' => $username, 'evaluacion_idevaluacion' => $idproject, 'fecha' => $date_string, 'actualizacion' => $date_string],
            ['valor' => Input::get('campo71', 0), 'posX' => 7, 'posY' => 1, 
            'usuario_codigo' => $username, 'evaluacion_idevaluacion' => $idproject, 'fecha' => $date_string, 'actualizacion' => $date_string],
            ['valor' => Input::get('campo72', 0), 'posX' => 7, 'posY' => 2, 
            'usuario_codigo' => $username, 'evaluacion_idevaluacion' => $idproject, 'fecha' => $date_string, 'actualizacion' => $date_string],
            ['valor' => Input::get('campo73', 0), 'posX' => 7, 'posY' => 3, 
            'usuario_codigo' => $username, 'evaluacion_idevaluacion' => $idproject, 'fecha' => $date_string, 'actualizacion' => $date_string],
            ['valor' => Input::get('campo74', 0), 'posX' => 7, 'posY' => 4, 
            'usuario_codigo' => $username, 'evaluacion_idevaluacion' => $idproject, 'fecha' => $date_string, 'actualizacion' => $date_string],
            ['valor' => Input::get('campo75', 0), 'posX' => 7, 'posY' => 5, 
            'usuario_codigo' => $username, 'evaluacion_idevaluacion' => $idproject, 'fecha' => $date_string, 'actualizacion' => $date_string],
            ['valor' => Input::get('campo76', 0), 'posX' => 7, 'posY' => 6, 
            'usuario_codigo' => $username, 'evaluacion_idevaluacion' => $idproject, 'fecha' => $date_string, 'actualizacion' => $date_string],
            ['valor' => Input::get('campo77', 0), 'posX' => 7, 'posY' => 7, 
            'usuario_codigo' => $username, 'evaluacion_idevaluacion' => $idproject, 'fecha' => $date_string, 'actualizacion' => $date_string]
        ]);
        return view('evaluacion-registrar')->with('session', $this->session->getSession())->with('status', 'C')
        ->with('idproject', $idproject)->with('operation', 'I');;
    }
}
