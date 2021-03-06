<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Produto;

class ProdutoController extends Controller
{
    public function index()
    {
        return Produto::all();
    }

    public function store(Request $request)
    {
        Produto::create($request->all());
    }

    public function show($id)
    {
        return Produto::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $produto = Produto::findOrFail($id);
        $produto->update($request->all());
    }

    public function destroy($id)
    {
        $produto = Produto::findOrFail($id);
        $produto->delete($id);
    }
}
