<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SessionService;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function get()
    {
        $session = new SessionService();
        return view('index')->with('session', $session->getSession());
    }
    public function index()
    {
        return view('home');
    }
}
