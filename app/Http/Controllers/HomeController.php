<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SessionService;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function get(Request $request)
    {
        return view('index')->with('session', $this->session->getSession());
    }
    public function index()
    {
        return view('home')->with('session', $this->session->getSession());
    }
}
