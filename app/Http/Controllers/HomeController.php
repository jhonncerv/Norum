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
        $this->middleware('auth', ['except' => ['nuevo', 'welcome']]);
    }

    /**
     * Enseña el dashboard una vez logeado
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        $arc = Archivo::active()->get();
        return view('welcome')->withActivos($arc)->withBodyClass('home');
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
        return view('archivos')->withArchivos($arc)->withBodyClass('dashboard');
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
                $nombre_gif = '/gifs/' . $nombre_gif;
                Archivo::create([
                    'nombre' => $request->titulo,
                    'link' => $nombre_gif
                ]);
                $res['status'] = 0;
                $res['msg'] = 'Guardado con exito';
                $res['path'] = $nombre_gif;
                $res['titulo'] = $request->titulo;
            } else {
                $res['status'] = 2;
                $res['error'] = 'Formato de imagen invalido';
            }
        } else {
            $res['status'] = 1;
            $res['error'] = 'Falta el archivo o el título';
        }
        return $res;
    }

    /**
     * Show the application dashboard for users.
     *
     * @return \Illuminate\Http\Response
     */
    public function usuarios()
    {
        $usuarios = User::all();
        return view('usuarios')->withUsuarios($usuarios)->withBodyClass('dashboard');
    }

    /**
     * Show the application dashboard for archives.
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

    /**
     * Service to activate or deactivate the archive
     *
     * @return array
     */
    public function editarArchivo($id) {

        $res = array(
            'status' => 4,
            'msg' => 'Error al guardar'
        );
        try {
            $prot = Archivo::findOrFail($id);
            $prot->activo = !$prot->activo;
            $prot->save();
            $res['status'] = 1;
            $res['activo'] = $prot->activo;
            $res['msg'] = "Guardado con exito";
        } catch (ModelNotFoundException $ex) {
            $res['msg'] = 'hackear es malo :(';
        }

        return $res;
    }

    /**
     * Service to activate or deactivate the archive
     *
     * @return array
     */
    public function borrarArchivo($id) {

        $res = array(
            'status' => 4,
            'msg' => 'Error al guardar'
        );
        try {
            $prot = Archivo::findOrFail($id);
            unlink(public_path($prot->link));
            $prot->delete();
            $res['status'] = 1;
            $res['msg'] = "Borrado con exito";
        } catch (ModelNotFoundException $ex) {
            $res['msg'] = 'hackear es malo :(';
        }

        return $res;
    }
}
