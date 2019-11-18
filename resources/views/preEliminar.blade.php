@extends("plantilla")

@section("seccion")

<h1>Eliminar Empresa</h1>

<h4>Id: {{ $empresa->id }}</h4>
<h4>Nombre: {{$empresa->name}}</h4>
<h4>Numero de empleados: {{$empresa->numeroDeEmpleados}}</h4>
<h4>Fecha de creacion: {{$empresa->fechaCreacionEmpresa}}</h4>
<a href="{{route("eliminar",$empresa)}}"  class="btn btn-primary">Eliminar</a>
@endsection