<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Proyecto;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\guardaProyecto;

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
     * Show the current proyects.
     *
     * @return \Illuminate\Http\Response
     */
    public function actuales()
    {
        $proyects = Proyecto::select('id', 'nombre')->active()->get();
        return $proyects;
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
    public function proyectos()
    {
        $projs = Proyecto::all();
        return view('proyectos')->withProyectos($projs);
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
    public function creaUnoNuevo(guardaProyecto $request)
    {
        Proyecto::create([
            'nombre' => $request->titulo,
            'problema' => $request->problema,
            'solucion' => $request->solucion,
            'link' => $request->link,
            //'marca_link' => $request->marca_link,
            //'marca_url' => $request->marca_url,
            'marca_nombre' => $request->marca_nombre
        ]);

        return redirect('/home');
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
    public function project($id)
    {
        try {
            $project = Proyecto::findOrFail($id);
        } catch (ModelNotFoundException $ex) {
            $project = 'hackear es malo :(';
        }
        return $project;
    }

}
