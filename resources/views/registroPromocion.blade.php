@extends('master')

@section('contenido')
<form action="{{url('/guardarPromocion')}}" method="POST">
<input id="token" type="hidden" name="_token" value="{{csrf_token() }}">
	<div class="from-group">
		<label for="nombre">Nombre:</label>
		<input type="text" class="form-control" name="nombre" required>
	</div>

	<div class="from-group">
		<label for="descripcion">descripción:</label>
		<input type="text" class="form-control" name="descripcion" required>
	</div>
	    
	<div class="from-group">
		<label for="correo">correo:</label>
		<input type="text" class="form-control" name="correo" required>
	</div>			
		<br>

	<div>
		<button type="submit" class="btn btn-primary">Registrar</button>
		<a href="{{url('/')}}" class="btn btn-danger">Cancelar</a>
	</div>

   	
</form>
  <script type="text/javascript">
        setTimeout(function(){
            $(".alert").fadeOut(1500);

        },1500);
    
   </script>

@stop