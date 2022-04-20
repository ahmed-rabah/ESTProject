<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\stagiaire;
use App\models\entreprise;
use App\models\feedbackEntreprise;
use App\models\feedbackStagiaire;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
  

    public function index()
    {
        return view('home');
    }

    
}
