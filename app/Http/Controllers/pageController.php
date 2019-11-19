<?php

namespace App\Http\Controllers;

use App\Exceptions\Handler;
use Illuminate\Http\Request;
use App\evaluaciontecnica;

class pageController extends Controller
{
    public function inicio(){
        \Log::info('pageController-inicio');
        $empresas = evaluaciontecnica::paginate(3);
        return view('welcome',compact("empresas"));
    }

    public function preEditar($id){
        \Log::info('pageController-preEditar');
        $empresa = evaluaciontecnica::find($id);
        return view('preEditar',compact("empresa"));
    }

    public function preEliminar($id){
        \Log::info('pageController-preEliminar');
        $empresa = evaluaciontecnica::find($id);
        return view('preEliminar',compact("empresa"));
    }

    public function eliminar($id){
        \Log::info('pageController-Eliminar');
        $empresa = evaluaciontecnica::find($id);
        $empresa->delete($id);
        return view('eliminar');
    }

    public function editar(Request $request){
        \Log::info('pageController-editar');
        $request->validate([
            "name" => "required",
            "numeroDeEmplados" => "min:1",
            "fechaCreacionEmpresa" => "required|before:today"
        ]);
        $empresa = evaluaciontecnica::find($request->id);
        $empresa->name = $request->name;
        $empresa->numeroDeEmpleados = $request->numeroDeEmpleados;
        $empresa->fechaCreacionEmpresa = $request->fechaCreacionEmpresa;
        $empresa->save();
        return $this->inicio();
    }

    public function crear(Request $request){
        \Log::info('pageController-crear');
        $request->validate([
            "name" => "required|unique",
            "numeroDeEmplados" => "min:1",
            "fechaCreacionEmpresa" => "required|before:today"
        ]);

        $empresa = new evaluaciontecnica();
        $empresa->name = $request->name;
        $empresa->numeroDeEmpleados = $request->numeroDeEmpleados;
        $empresa->fechaCreacionEmpresa = $request->fechaCreacionEmpresa;
        $empresa->save();
        return back()->with('mensaje','Empresa Agregada');
    }
}
