<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use DB;
use App\Quotation;

class HelpController extends Controller
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
        return view('help')->with('status', 'C');
    }
    public function create()
    {
        $errors = array();
        //$results = DB::select('select * from usuario where codigo = ?', array(request('name')));
        $results = DB::select('select * from usuario');
        
        var_dump($results);
        if (count($results) == 0){
            array_push($errors, 'El codigo es invalido');
            array_push($errors, 'Error 2');
        }
        return view('help')->with('status', 'S')->with('errors', $errors)->with('res', $results)->with('data', request()->all());
    }
}
