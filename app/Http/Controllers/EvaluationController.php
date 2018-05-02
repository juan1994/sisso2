<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use DB;
use App\Quotation;

class EvaluationController extends Controller
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

    public function get()
    {
        return view('evaluacion-registrar')->with('status', 'C');
    }
    public function getCal()
    {
        return view('evaluacion-reg-calificacion')->with('status', 'C');
    }
}
