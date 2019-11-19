<?php

namespace App\Http\Controllers;

use App\Exceptions\Handler;
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
        return view('eliminar');
    }

    public function editar(Request $request){
        $request->validate([
            "name" => "required",
            "fechaCreacionEmpresa" => "required"
        ]);
        $empresa = evaluaciontecnica::find($request->id);
        $empresa->name = $request->name;
        $empresa->numeroDeEmpleados = $request->numeroDeEmpleados;
        $empresa->fechaCreacionEmpresa = $request->fechaCreacionEmpresa;
        $empresa->save();
        return $this->inicio();
    }

    public function crear(Request $request){
        $request->validate([
            "name" => "required",
            "fechaCreacionEmpresa" => "required"
        ]);

        $empresa = new evaluaciontecnica();
        $empresa->name = $request->name;
        $empresa->numeroDeEmpleados = $request->numeroDeEmpleados;
        $empresa->fechaCreacionEmpresa = $request->fechaCreacionEmpresa;
        $empresa->save();
        return back()->with('mensaje','Empresa Agregada');
    }
}
