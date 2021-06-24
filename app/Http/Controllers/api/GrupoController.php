<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Grupo;

class GrupoController extends Controller
{

    public function index()
    {
        return Grupo::all();
    }

    public function store(Request $request)
    {
        Grupo::create($request->all());
    }

    public function show($id)
    {
        return Grupo::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $grupo = Grupo::findOrFail($id);
        $grupo->update($request->all());
    }

    public function destroy($id)
    {
        $grupo = Grupo::findOrFail($id);
        $grupo->delete($id);
    }
}
