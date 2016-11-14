<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Archivo;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['actuales','project']]);
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function archivos()
    {
        $arc = Archivo::all();
        return view('archivos')->withArchivos($arc);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function nuevo()
    {
        return view('nuevo');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function usuarios()
    {
        $usuarios = User::all();
        return view('usuarios')->withUsuarios($usuarios);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function archivo($id)
    {
        try {
            $project = Archivo::findOrFail($id);
        } catch (ModelNotFoundException $ex) {
            $project = 'hackear es malo :(';
        }
        return $project;
    }

}
