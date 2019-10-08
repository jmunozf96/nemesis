<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Perfil\PerfilController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private $perfil;

    public function __construct()
    {
        $this->perfil = new PerfilController();
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home', [
            'recursos' => ['recursos' => $this->perfil->getRecursos(Auth::user()->ID)]
        ]);
    }
}
