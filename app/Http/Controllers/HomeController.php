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
        $this->middleware('auth', ['except' => ['nuevo']]);
    }


    /**
     * Enseña el dashboard una vez logeado
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Enseña todos los archivos subidos
     *
     * @return \Illuminate\Http\Response
     */
    public function archivos()
    {
        $arc = Archivo::all();
        return view('archivos')->withArchivos($arc);
    }

    /**
     * Crea un nuevo archivo y lo sube al servidor
     *
     * @return array
     */
    public function nuevo(Request $request)
    {
        $res = array(
            'status' => 4,
            'msg' => 'Error al guardar'
        );
        if (!file_exists(public_path('gifs'))) {
            mkdir(public_path('gifs'), 0755, true);
        }
        if ($request->hasFile('archivo') && $request->has('titulo')){
            if ($request->file('archivo')->isValid() && $request->archivo->extension() == 'gif'){
                $nombre_gif = str_random(10) . '.gif';
                $request->file('archivo')->move(public_path('gifs'), $nombre_gif );
                //Archivo::create([]);

                $res['status'] = 0;
                $res['msg'] = 'Guardado con exito';
                $res['path'] = '/gifs/' . $nombre_gif;
            } else {
                $res['status'] = 2;
                $res['msg'] = 'Formato de imagen invalido';
            }
        } else {
            $res['status'] = 1;
            $res['msg'] = 'Falta el archivo o el título';
        }
        return $res;
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
