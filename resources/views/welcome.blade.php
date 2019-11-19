@extends('plantilla')
@section('seccion')

<div class="container my-4">
        <h1 class="dispaly-4">Empresas</h1>
        @if (session("mensaje"))
            <div class="alert alert-succes">
              {{session("mensaje")}}
            </div>
        @endif
        <form action="{{route("empresa.crear")}}" method="POST">
          @csrf
          @if($errors->has("name"))
            <div class="alert alert-danger alert-dismissible fade show" >
              El nombre es requerido
            </div>
          @endif
          @if($errors->has("fechaCreacionEmpresa"))
            <div class="alert alert-danger alert-dismissible fade show" >
              La Fecha de creacion es requerida
            </div>
          @endif
          <input type="text" name="name" placeholder="Nombre" class="form-control mb-2">
          <input type="number" name="numeroDeEmpleados" placeholder="Numero de Empleados" class="form-control mb-2" >
          <input type="date" name="fechaCreacionEmpresa" class="form-control mb-2" >
          <button class="btn btn-primary btn-block" type="submit">Agregar</button>
        </form>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Numero de Empleados</th>
                <th scope="col">Fecha de Creación</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($empresas as $empresa)
              <tr>
              <th scope="row">{{$empresa->id}}</th>
                <td>{{$empresa->name}}</td>
                <td>{{$empresa->numeroDeEmpleados}}</td>
                <td>{{$empresa->fechaCreacionEmpresa}}</td>
                <td><a href="{{route('preEditar',$empresa)}}" class="btn btn-primary btn-sm">Editar</a>
                    <a href="{{route('preEliminar',$empresa)}}" class="btn btn-danger btn-sm">Eliminar</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{$empresas->links()}}
    </div>
@endsection
