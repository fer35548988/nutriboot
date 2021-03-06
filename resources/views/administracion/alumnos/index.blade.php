@extends('administracion.template.main')

@section('title', 'Gestion de Alumnos')

@section('contenido')

<div class="container col-md-12">

<div class="row">
          <div class="col-md-12">
              <div class="panel panel-danger">
                  <div class="panel-heading text-center"><h4><strong>Escuela: </strong> {{$escuela->nombre}}</h4></div>
             </div>
         </div>
</div>


  <div class="row">
        <div class="col-md-12">
            <a href="{{ route('alumno.create') }}" class="btn btn-primary" role="button">Nuevo Alumno</a><br><br>
            {{-- Buscador de Alumno --}}
            {{Form::open(['route'=>'alumno.index', 'method'=>'GET', 'class'=>'navbar-form pull-right' ])}}
                <div class="input-group">
                  {{Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Buscar Alumnos..', 'aria-describedby' =>'search'])}}
                  <span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
                </div>
            {{Form::close()}}
            {{-- Fin del Buscador --}}
      </div>
</div>

<div class="row">
    <div class="col-md-12">
      <div class="panel panel-info">
          <div class="panel-heading text-center"><strong>Listado de Alumnos</strong></div>
                <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Dni</th>
                                <th>Dirección</th>
                                <th>Fecha de Nacimiento</th>
                                <th>Tutor</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($alumnos as $alumno)
                            <tr>
                                <td> {{$alumno->id}} </td>
                                <td> {{$alumno->nombre}} </td>
                                <td> {{$alumno->dni}} </td>
                                <td> {{$alumno->direccion}} </td>
                                <td> {{$alumno->fechaNacimiento}} </td>
                                <td> {{$alumno->nombreTutor}} </td>
                                <td>
                                    <a href="{{ route('alumno.show', $alumno->id)}}" class="btn btn-info"><span class="glyphicon glyphicon-eye-open"></span></a>
                                    <a href="{{ route('alumno.edit', $alumno->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></a>
                                    <a href="{{ route('admin.alumno.destroy', $alumno->id) }}"
                                    onclick="return confirm('¿Seguro que deseas eliminarlo?')"  class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                </table>
              </div>
					</div>
			</div>
</div>

        {!! $alumnos->render() !!}
@endsection
