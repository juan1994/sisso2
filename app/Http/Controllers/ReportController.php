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
}
