@extends('master')

@section('contenido')
<form action="{{url('/actualizarProyecto')}}/{{$proyecto->id}}" method="POST">
<input id="token" type="hidden" name="_token" value="{{csrf_token() }}">
	<div class="from-group">
		<label for="descripcion">Descripcion:</label>
		<input type="text" class="form-control" name="descripcion" required value="{{$proyecto->descripcion}}">
	</div>
	<div class="from-group">
		<label for="fecha_inicio">Fecha Inicio:</label>
		<input type="Date" class="form-control" name="fecha_inicio" required value="{{$proyecto->fecha_inicio}}">

	</div>
	<div class="from-group">
		<label for="fecha_entrega">Fecha Entrega:</label>
		<input type="Date" class="form-control" name="fecha_entrega" required value="{{$proyecto->fecha_entrega}}">

	</div>
	
	<div class="from-group">
	    <label for="encargado">Encargado:</label>
		<select name="encargado" class="form-control">
		<option selected="" value="{{$proyecto->encargado_id}}">
			{{$proyecto->nombre}}</option>
		    @foreach($encargados as $a)
			<option value="{{$a->id}}">{{$a->nombre}}</option>
			@endforeach
		</select>
	</div>

	<div class="from-group">
	    <label for="estado">Estado:</label>
		<select name="estado" class="form-control">
		            @if($proyecto->estado==0)
    				<option value="0" selected>Pendiente</option>
    				@elseif($proyecto->estado==1)
    				<option value="1" >En Procesos</option>
    				@elseif($proyecto->estado==2)
    				<option value="2">Finalizado</option>
    				@elseif($proyecto->estado==3)
    				<option value="3">Cancelado</option>
    				@endif
		 
			<option value="0" selected>Pendiente</option>
			<option value="1" >En Procesos</option>
			<option value="2">Finalizado</option>
			<option value="3">Cancelado</option>
			
		</select>

	<div><br>
		<button type="submit" class="btn btn-primary">Actualizar</button>
		<a href="{{url('/')}}" class="btn btn-danger">Cancelar</a>
	</div>

</form>

@stop