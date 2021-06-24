<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Campanha;

use Illuminate\Support\Facades\DB;

class CampanhaController extends Controller
{
    public function index()
    {
        $campanha = DB::table('campanhas')
            ->leftJoin('grupos', 'campanhas.id_grupo', '=', 'grupos.id')
            ->select('campanhas.*', 'grupos.grupo')
            ->get();

        return $campanha;
    }

    public function store(Request $request)
    {
        $grupo = $request->input('id_grupo');

        if (DB::table('campanhas')
            ->where('ativa', 1)
            ->where('id_grupo', $grupo)
            ->count() == 0) {            
                Campanha::create($request->all());                
        }else{
            return ('Já existe uma campanha ativa nesse grupo');
        }
    }

    public function show($id)
    {
        $campanha = DB::table('campanhas')
            ->leftJoin('grupos', 'campanhas.id_grupo', '=', 'grupos.id')
            ->select('campanhas.*', 'grupos.grupo')
            ->where('campanhas.id', '=', $id)
            ->get();

        return $campanha;
    }

    public function update(Request $request, $id)
    {
        $campanha = Campanha::findOrFail($id);
        $campanha->update($request->all());
    }

    public function destroy($id)
    {
        $campanha = Campanha::findOrFail($id);
        $campanha->delete($id);
    }
}
