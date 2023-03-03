<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ConsultarLibros extends Controller
{
    /** 
    * Función que se encarga de retornar la vista de los libros, con la consulta de todos los libros
    *
    * @return view Vista de los libros tras la consulta SELECT * FROM libro
    * @author Álvaro Tapiador <alvarotapiador@gmail.com>
    * @version 1.0.0 Estable
    */
    public function index()
    {
        $libros = DB::select('SELECT * FROM libro');
        return view('vista_libros',['libros'=>$libros]);
    }

    /** 
    * Función que se encarga de retornar la vista buscar libros
    *
    * @return view Vista de buscar_libros
    * @author Álvaro Tapiador <alvarotapiador@gmail.com>
    * @version 1.0.0 Estable
    */
    public function buscar_libros()
    {
        return view('buscar_libros');
    }

    /** 
    * Función que se encarga de consultar los libros según el valor pasado por parámetro
    *
    * @param object $request Caracteres introducidos en la búsqueda
    * @return json Json con la respuesta a la consulta SELECT * FROM libro WHERE titulo LIKE '%$valor%'
    * @author Álvaro Tapiador <alvarotapiador@gmail.com>
    * @version 1.0.0 Estable
    */
    public function consultar_libros(Request $request)
    {
        $valor = $request->q;
        $libros = DB::select("SELECT * FROM libro WHERE titulo LIKE '%$valor%'");
        return response()->json($libros, 200);
    }
}
