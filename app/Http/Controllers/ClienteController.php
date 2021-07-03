<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
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
        $clientes = Cliente::with('cidade')->get();
        return response()->json($clientes);
    }

    public function create(Request $request)
    {
        $cliente = new Cliente;
        $cliente->nome = $request->nome;
        $cliente->cidade_id = $request->cidade_id;
        $cliente->cpf = $request->cpf;

        $cliente->save();
        return response()->json($cliente);
    }

    public function show($id)
    {
        $cliente = Cliente::with('cidade')->find($id);
        return response()->json($cliente);
    }

    public function update(Request $request, $id)
    {
        $cliente = Cliente::find($id);

        $cliente->nome = $request->input('nome');
        $cliente->cidade_id = $request->input('cidade_id');
        $cliente->cpf = $request->input('cpf');

        $cliente->save();
        return response()->json($cliente);
    }

    public function destroy($id)
    {
        $cliente = Cliente::find($id);
        $cliente->delete();
        return response()->json('cliente removed successfully');
    }
}
