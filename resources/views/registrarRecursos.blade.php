@extends('master')

@section('contenido')
@include('flash::message')
<form action="{{url('/guardarRecurso')}}" method="POST">
<input id="token" type="hidden" name="_token" value="{{csrf_token() }}">
	<div class="from-group">
		<label for="nombre">Nombre:</label>
		<input type="text" class="form-control" name="nombre" required>
	</div>
	<div class="from-group">
		<label for="correo">Email:</label>
		<input type="text" class="form-control" name="correo" required>

	</div>
	<div class="from-group">
		<label for="edad">Edad:</label>
		<input type="text" class="form-control" name="edad" required>

	</div>
	
	<div class="from-group">
	    <label for="puesto">Puesto:</label>
		<select name="puesto" class="form-control">
		    @foreach($puestos as $a)
			<option value="{{$a->id}}">{{$a->descripcion}}</option>
			@endforeach
		</select>
	</div>
	<br>

	<div>
		<button type="submit" class="btn btn-primary">Guardar</button>
		<a href="{{url('/')}}" class="btn btn-danger">Cancelar</a>
	</div>

</form>


@stop
