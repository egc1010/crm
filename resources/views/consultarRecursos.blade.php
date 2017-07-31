@extends('master')

@section('contenido')
<table class="table table-hover">
@include('flash::message')
    <thead>
        <tr>
            <th>ID</th>
            <th>nombre</th>
            <th>imail</th>
            <th>edad</th>
            <th>Puesto</th>
            <th>Opciones</th>
    </tr>
    </thead>
    <thead>
        <tbody>
            @foreach($recursos as $r)
            <tr>
                <td>{{$r->id}}</td>
                <td>{{$r->nombre}}</td>
                <td>{{$r->correo}}</td>
                <td>{{$r->edad}}</td>  
                <td>{{$r->descripcion}}</td>
                <td>
                    @if($r->descripcion==0)
                    <span class="label label-default"></span>
                    
                    @endif
                </td>

            <td>
                    <a href="{{url('/editarRecurso')}}/{{$r->id}}" class="btn btn-xs btn-primary">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>
                    <a href="{{url('/eliminarRecurso')}}/{{$r->id}}" class="btn btn-xs btn-danger">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </a>
                    <a href="{{url('/recursosPDF')}}" class="btn btn-xs btn-info">  
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