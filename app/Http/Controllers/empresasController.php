<?php

namespace App\Http\Controllers;

use App\evaluaciontecnica;
use Illuminate\Http\Request;
use evaluaviontecnica\empresas;

class empresasController extends Controller
{
    public function getAll(){
        $empresas =evaluaciontecnica::all();
        return $empresas;
    }

    public function add(Request $request){
        $empresa =evaluaciontecnica::create($request->all());
        return $empresa;
    }

    public function get($id){
        $empresa = evaluaciontecnica::findOrFail($id);
        return $empresa;
    }

    public function edit($id, Request $request){
        $empresa = $this->get($id);
        $empresa->fill($request->all())->save();
        return $empresa;
    }
    public function delete($id){
        $empresa = $this->get($id);
        $empresa->delete($id);
        return $empresa;
    }
}
