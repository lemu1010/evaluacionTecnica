<?php

namespace App\Http\Controllers;

use App\evaluaciontecnica;
use Illuminate\Http\Request;

class empresasController extends Controller
{
    public function getAll(){
        \Log::info('empresasController-getAll');
        $empresas =evaluaciontecnica::all();
        return $empresas;
    }

    public function add(Request $request){
        \Log::info('empresasController-add');
        $empresa =evaluaciontecnica::create($request->all());
        return $empresa;
    }

    public function get($id){
        \Log::info('empresasController-ID:id');
        $empresa = evaluaciontecnica::findOrFail($id);
        return $empresa;
    }

    public function edit($id, Request $request){
        \Log::info('empresasController-edit-ID:$id');
        $empresa = $this->get($id);
        $empresa->fill($request->all())->save();
        return $empresa;
    }
    public function delete($id){
        \Log::info('empresasController-delete-ID:$id');
        $empresa = $this->get($id);
        $empresa->delete($id);
        return $empresa;
    }
}
