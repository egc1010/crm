@extends('master')

@section('contenido')
<table class="table table-hover">
@include('flash::message')
    <thead>
        <tr>
            <th>ID</th>
            <th>nombre</th>
            <th>descripción</th>
            
    </tr>
    </thead>
    <thead>
        <tbody>
            @foreach($promocion as $p)
            <tr>
                <td>{{$p->id}}</td>
                <td>{{$p->nombre}}</td>
                <td>{{$p->descripcion}}</td>
                
            <td>
                    <a href="{{url('/editarPromocion')}}/{{$p->id}}" class="btn btn-xs btn-primary">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>
                    <a href="{{url('/eliminarPromocion')}}/{{$p->id}}" class="btn btn-xs btn-danger">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
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