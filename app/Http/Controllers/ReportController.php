<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Services\SessionService;
use DB;
use App\Quotation;

class ReportController extends Controller
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

    public function get()
    {
        return view('reporte-registrar')->with('session', $this->session->getSession())->with('status', 'C');
    }
    public function index(){     
        $start = Input::get('start','');
        $end = Input::get('end','');
        if($start != '' && $end != ''){
            $results = DB::select('SELECT generate_report1_low(?,?) as low, generate_report1_mid(?,?) as mid, generate_report1_high(?,?) as high', array($start,$end, $start,$end, $start,$end));
            return response()->json([
                'bajo' => $results[0]->low,
                'medio' => $results[0]->mid,
                'alto' => $results[0]->high
            ]);
        }else{
            return response()->json([
                'bajo' => 0,
                'medio' => 0,
                'alto' => 0
            ]);
        }
    }
}
