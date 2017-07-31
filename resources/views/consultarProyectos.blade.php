@extends('master')

@section('contenido')
<table class="table table-hover">
 @include('flash::message')
   <thead>
    	<tr>
    		<th>ID</th>
    		<th>Descripción</th>
    		<th>fecha Inicio</th>
    		<th>fecha Entrega</th>
    		<th>Encargado</th>
    		<th>Estado</th>
            <th>Opciones</th>
 	</tr>
    </thead>
    <thead>
    	<tbody>
    		@foreach($proyectos as $p)
    		<tr>
    			<td>{{$p->id}}</td>
    			<td>{{$p->descripcion}}</td>
    			<td>{{$p->fecha_inicio}}</td>
    			<td>{{$p->fecha_entrega}}</td> 
    			<td>{{$p->nombre}}</td>
    			<td>
    				@if($p->estado==0)
    				<span class="label label-default">Pendiente</span>
    				@elseif($p->estado==1)
    				<span class="label label-primary">En proceso</span>
    				@elseif($p->estado==2)
    				<span class="label label-success">Finalizado</span>
    				@elseif($p->estado==3)
    				<span class="label label-danger">Cancelado</span>
    				@endif
    			</td>
    		
    			<td>
                    <a href="{{url('/asignarRecurso')}}/{{$p->id}}" class="btn btn-xs btn-success">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
    				<a href="{{url('/editarProyecto')}}/{{$p->id}}" class="btn btn-xs btn-primary">
    					<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
    				</a>
    				<a href="{{url('/eliminarProyecto')}}/{{$p->id}}" class="btn btn-xs btn-danger">
    					<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
    				</a>
                    <a href="{{url('/proyectosPDF')}}" class="btn btn-xs btn-info">  
                     <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
                     </a>
                   
    			</td>
    		</tr>
    		@endforeach
    	</tbody>
    </thead>
	
</table>
<script type="text/javascript">
        setTimeout(function(){
            $(".alert").fadeOut(1500);

        },1500);
         </script>

@stop