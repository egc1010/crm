@extends('master')

@section('contenido')
@include('flash::message')

<form action="{{url('/actualizarRecurso')}}/{{$recursos->id}}" method="POST">
<input id="token" type="hidden" name="_token" value="{{csrf_token() }}">
	<div class="from-group">
		<label for="nombre">nombre:</label>
		<input type="text" class="form-control" name="nombre" required value="{{$recursos->nombre}}">
	</div>
	<div class="from-group">
		<label for="correo">email:</label>
		<input type="text" class="form-control" name="correo" required value="{{$recursos->correo}}">

	</div>
	<div class="from-group">
		<label for="edad">Edad:</label>
		<input type="text" class="form-control" name="edad" required value="{{$recursos->edad}}">

	</div>
	
	
	<div class="from-group">
	    <label for="puesto">Puesto:</label>
		<select name="puesto" class="form-control">
		<option selected="" value="{{$recursos->puesto_id}}">
		{{$recursos->descripcion}}</option>
		    @foreach($puestos as $r)
			<option value="{{$r->id}}">{{$r->descripcion}}</option>
			@endforeach
		</select>
	</div><br>
      
	

	<div>
		<button type="submit" class="btn btn-primary">Actualizar</button>
		<a href="{{url('/')}}" class="btn btn-danger">Cancelar</a>
	</div>

</form>

@stop