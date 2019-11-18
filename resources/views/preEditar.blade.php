@extends("plantilla")

@section("seccion")

<h1>Editar Empresa</h1>

<form action="{{route("editar",$empresa)}}" method="POST">
    @csrf
    <h4>Id: {{ $empresa->id }} </h4>
    <label >Nombre:</label>
    <input type="text" name="name" value="{{ $empresa->name }}" class="form-control mb-2">
    <label >Numero de Empleados:</label>
    <input type="number" name="numeroDeEmpleados" value="{{ $empresa->numeroDeEmpleados}}" class="form-control mb-2" >
    <label >Fecha de creacion:</label>
    <input type="date" name="fechaCreacionEmpresa" value="{{ $empresa->fechaCreacionEmpresa}}" class="form-control mb-2" >
    <button class="btn btn-primary btn-block" type="submit">Editar</button>
  </form>
@endsection