<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\evaluaciontecnica;

class pageController extends Controller
{
    public function inicio(){
        $empresas = evaluaciontecnica::all();
        return view('welcome',compact("empresas"));
    }

    public function preEditar($id){
        $empresa = evaluaciontecnica::find($id);
        return view('preEditar',compact("empresa"));
    }

    public function preEliminar($id){
        $empresa = evaluaciontecnica::find($id);
        return view('preEliminar',compact("empresa"));
    }

    public function eliminar($id){
        $empresa = evaluaciontecnica::find($id);
        $empresa->delete($id);
        return $this->inicio();
    }

    public function editar(Request $request){
        $empresa = evaluaciontecnica::find($request->id);
        $empresa->name = $request->name;
        $empresa->numeroDeEmpleados = $request->numeroDeEmpleados;
        $empresa->fechaCreacionEmpresa = $request->fechaCreacionEmpresa;
        $empresa->save();        
        return $this->inicio();
    }

    public function crear(Request $request){
        $empresa = new evaluaciontecnica();
        $empresa->name = $request->name;
        $empresa->numeroDeEmpleados = $request->numeroDeEmpleados;
        $empresa->fechaCreacionEmpresa = $request->fechaCreacionEmpresa;
        $empresa->save();
        return back()->with('mensaje','Empresa Agregada');
    }
}
