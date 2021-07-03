<?php

namespace App\Http\Controllers;

use App\Models\Cidade;
use Illuminate\Http\Request;

class CidadeController extends Controller
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
        $cidades = Cidade::with('estado')->get();
        return response()->json($cidades);
    }

    public function create(Request $request)
    {
        $cidade = new Cidade;
        $cidade->nome = $request->nome;
        $cidade->uf_id = $request->uf_id;

        $cidade->save();
        return response()->json($cidade);
    }

    public function show($id)
    {
        $cidade = Cidade::with('estado')->find($id);
        return response()->json($cidade);
    }

    public function update(Request $request, $id)
    {
        $cidade = Cidade::find($id);

        $cidade->nome = $request->input('nome');
        $cidade->uf_id = $request->input('uf_id');

        $cidade->save();
        return response()->json($cidade);
    }

    public function destroy($id)
    {
        $cidade = Cidade::find($id);
        $cidade->delete();
        return response()->json('cidade removed successfully');
    }
}
