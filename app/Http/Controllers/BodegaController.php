<?php

namespace App\Http\Controllers;

use App\Bodega;
use Illuminate\Http\Request;

class BodegaController extends Controller
{

    public function index(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;

        $bodegas = Bodega::all()
        ->where('articulos.'.$criterio, 'like', '%'. $buscar . '%');

        return ['bodegas' => $bodegas];
    }

    public static function add_directorio( $directory, $cache_path ) {

        if( ! File::exists( $cache_path.'/'.$directory ) ) {
            File::makeDirectory( $cache_path.'/'.$directory );
    }
    }

    public function crearDirectorio($path, $mode = 0755, $recursive = false, $force = false)
    {
    if ($force)
    {
        return @mkdir($path, $mode, $recursive);
    }
    else
    {
        return mkdir($path, $mode, $recursive);
    }
    }

    public function store(Request $request)
    {   
        $request->validate([
            'nombre' => 'required|string',
            'stock' =>  'required|integer',
            'descripcion' => 'required|string|min:20|max:200'
        ]);
        if (!$request->ajax()) return redirect('/');
        Bodega::create($request->all());

        return back()->with('status', 'Se ha creado una nueva carpeta');
    }

    public function update(Request $request, Bodega $id)
    {
        if (!$request->ajax()) return redirect('/');
        Bodega::findOrFail($id)->update($request->all());

        return back()->with('status', 'Se ha editado una carpeta');
    }

    public function destroy(Bodega $id)
    {
        Bodega::findOrFail($id)->delete();

        return back()->with('status', 'Se ha eliminado una carpeta');
    }
}
