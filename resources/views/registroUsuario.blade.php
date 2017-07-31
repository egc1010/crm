@extends('master')

@section('contenido')
@include('flash::message')

<form action="{{url('/guardarUsuarios')}}" method="POST">
<input id="token" type="hidden" name="_token" value="{{csrf_token() }}">
	<div class="from-group">
		<label for="nombre">Nombre:</label>
		<input type="text" class="form-control" name="nombre" required>
	</div>

		<div class="from-group">
		<label for="correo">Correo</label>
		<input type="email" class="form-control" name="correo" required>
		</div>

	<div class="from-group">
		<label for="edad">edad</label>
		<input type="text" class="form-control" name="edad" required>
	</div>

<br>
	<div class="from-group">
		<label for="sexo">Sexo</label>
		<select name="sexo"  required>
		 
			<option value="0" selected></option>
			<option value="Hombre" >Hombre</option>
			<option value="Mujer">Mujer</option>
			</select>
		</div>
<br>
		<div class="from-group">
		<label for="pais">País</label>
		<input type="text" class="form-control" name="pais" required>
		</div>

	
		<div class="from-group">
		<label for="estado">Estado</label>
		<input type="text" class="form-control" name="estado" required>
		</div>

<br>
		<div class="from-group">
		<label for="estado_civil">Estado Civil:</label>
		<select name="estado_civil"  required>
		<option value="0" selected></option>
		<option value="casado">Casado(a)</option>
		<option value="soltero">Soltero(a)</option>
		<option value="divorciado">Divorciado(a)</option>
		<option value="viudo">Viudo(a)</option>
		</select>
	
		</div>

<br>
		<div class="from-group">
		<label for="hijos">Hijos</label>
		<select name="hijos" required="">
		<option value="" selected></option>
			<option value="0">0</option>
			<option value="1">1</option>
			<option value="2">2 o mas</option>
			<option value="4">4 o mas</option>
					
		</select>

		</div>

	<div class="from-group">
		<label for="trabajo">Trabajo</label>
	<input type="text" class="form-control" name="trabajo" required>
<br>	
	<div class="from-group">
		<label for="intereses">intereses</label>
<select name="intereses" required>
		<option value="0" selected></option>
		<option value="Fiestas">Fiestas</option>
		<option value="Tecnologia">Tecnologia</option>
		<option value="Viajar">Viajar</option>
		<option value="Deportes">Deportes</option>
		<option value="Camping">Camping</option>

</select>	

</div>

	<div class="from-group">
	    			
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