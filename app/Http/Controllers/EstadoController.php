<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use Illuminate\Http\Request;

class EstadoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index()
    {
        $estados = Estado::all();
        return response()->json($estados);
    }

    public function create(Request $request)
    {
        $estado = new Estado;
        $estado->nome = $request->nome;
        $estado->uf = $request->uf;

        $estado->save();
        return response()->json($estado);
    }

    public function show($id)
    {
        $estado = Estado::find($id);
        return response()->json($estado);
    }

    public function update(Request $request, $id)
    {
        $estado = Estado::find($id);

        $estado->nome = $request->input('nome');
        $estado->uf = $request->input('uf');

        $estado->save();
        return response()->json($estado);
    }

    public function destroy($id)
    {
        $estado = Estado::find($id);
        $estado->delete();
        return response()->json('estado removed successfully');
    }
}
