<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Desconto;

use Illuminate\Support\Facades\DB;

class DescontoController extends Controller
{
    public function index()
    {
        $descontos = DB::table('descontos')
            ->leftJoin('campanhas', 'descontos.id_campanha', '=', 'campanhas.id')
            ->leftJoin('produtos', 'descontos.id_produto', '=', 'produtos.id')
            ->select('descontos.*', 'campanhas.campanha', 'produtos.produto', 'produtos.preco')
            ->get();

        return $descontos;
    }

    public function store(Request $request)
    {
        Desconto::create($request->all());
    }

    public function show($id)
    {
        $descontos = DB::table('descontos')
            ->leftJoin('campanhas', 'descontos.id_campanha', '=', 'campanhas.id')
            ->leftJoin('produtos', 'descontos.id_produto', '=', 'produtos.id')
            ->select('descontos.*', 'campanhas.campanha', 'produtos.produto', 'produtos.preco')
            ->where('descontos.id', '=', $id)
            ->get();

        return $descontos;
    }

    public function update(Request $request, $id)
    {
        $desconto = Desconto::findOrFail($id);
        $desconto->update($request->all());
    }

    public function destroy($id)
    {
        $desconto = Desconto::findOrFail($id);
        $desconto->delete($id);
    }
}
