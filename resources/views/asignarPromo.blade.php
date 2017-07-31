@extends('master')

@section('contenido')
   <h2>Proyecto: {{$usuarios->descripcion}}</h2>

   <form action="{{url('/guardarAsig')}}/{{$usuarios->id}}" method="POST">
   <input id="token" type="hidden" name="_token" value="{{csrf_token() }}" type="text">
   <div class="form-group">
        <label for="recurso">Recursos no Asignados</label>
        <select name="recurso_id" class="form-control" id="">
        	<option value="0">Selecciona un Recurso</option>
        	@foreach($recursosNoAsig as $r)
        	<option value="{{$r->id}}">{{$r->sexo}}</option>
        	@endforeach
        </select><br>
        <button  type="submit" class="btn- btn-primary">Asignar</button>	
   </div>
   </form>
   @include('flash::message')
   <div class="row">
   	<div class="col-xs-8">
   	<h3>Lista De recursos Asignados</h3>
   	<br>
   	    <table class="table table-striped">
   	    <thead>
   	    	<tr>
   	    		<th>Nombre del Recurso</th>
   	    		<th>Eliminar</th>
   	    	</tr>
   	    </thead>
   	    <tbody>
   	    	@foreach($recursosAsig as $ra)
   	    	<tr>
   	    		<td>{{$ra->nombre}}</td>
   	    		<td>
   	    			<a href="{{url('/eliminarAsig')}}/{{$ra->id}}/{{$usuarios->id}}" class="btn btn-xs btn-danger">
   	    				<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
   	    			</a>
   	    		</td>
   	    	</tr>
   	    	@endforeach
   	    </tbody>
   	    	
   	    </table>
   		
   	</div>
   </div>
   <script type="text/javascript">
        setTimeout(function(){
        	$(".alert").fadeOut(1500);

        },1500);
   	
   </script>

@stop