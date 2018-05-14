<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Services\SessionService;
use DB;
use Storage;
use App\Quotation;

class HelpController extends Controller
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
        //return Storage::download('test.jpg');
        return view('help')->with('session', $this->session->getSession())->with('status', 'C');
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
