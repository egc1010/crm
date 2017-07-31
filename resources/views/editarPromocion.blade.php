@extends('master')

@section('contenido')
<form action="{{url('/actualizarPromocion')}}/{{$promocion->id}}" method="POST">
<input id="token" type="hidden" name="_token" value="{{csrf_token() }}">
	<div class="from-group">
		<label for="nombre">nombre:</label>
		<input type="text" class="form-control" name="nombre" required value="{{$promocion->nombre}}">
	</div>
	<div class="from-group">
		<label for="descripcion">descripcion:</label>
		<input type="text" class="form-control" name="descripcion" required value="{{$promocion->descripcion}}">

	</div>
	

      
	

	<div>
		<button type="submit" class="btn btn-primary">Actualizar</button>
		<a href="{{url('/')}}" class="btn btn-danger">Cancelar</a>
	</div>

</form>

@stop