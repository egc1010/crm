@extends('master')

@section('contenido')
<table class="table table-hover">
@include('flash::message')
    <thead>
        <tr>
            <th>ID</th>
            <th>nombre</th>
            <th>correo</th>
            <th>edad</th>
            <th>sexo</th>
            <th>pais</th>
            <th>estado</th>
            <th>estado_civil</th>
            <th>hijos</th>
            <th>trabajo</th>
            <th>intereses</th>
    </tr>
    </thead>
    <thead>
        <tbody>
            @foreach($usuarios as $u)
            <tr>
                <td>{{$u->id}}</td>
                <td>{{$u->nombre}}</td>
                <td>{{$u->correo}}</td>
                <td>{{$u->edad}}</td>
                <td>{{$u->sexo}}</td>  
                <td>{{$u->pais}}</td>
                  <td>{{$u->estado}}</td>
                    <td>{{$u->estado_civil}}</td>
                      <td>{{$u->hijos}}</td>
                        <td>{{$u->trabajo}}</td>
                          <td>{{$u->intereses}}</td>
                        
                

            <td>
                    <a href="{{url('/editarUsuario')}}/{{$u->id}}" class="btn btn-xs btn-primary">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>
                    <a href="{{url('/eliminarUsuario')}}/{{$u->id}}" class="btn btn-xs btn-danger">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </a>
                    <a href="{{url('/asignarPromo')}}/{{$u->id}}" class="btn btn-xs btn-success">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                 
                   
            </td>
            </tr>
            @endforeach
        </tbody>
    </thead>
  
</table>

<form action="" method="POST">
<div>

   <div class="from-group">
        <label for="sexo">Sexo</label>
        <select name="sexo"  required>
         
            <option value="0" selected></option>
            <option value="Hombre" >Hombre</option>
            <option value="Mujer">Mujer</option>
            </select>
        </div>
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
        <div class="from-group">
        <label for="hijos">Hijos</label>
        <select name="hijos" required="">
        <option value="" selected></option>
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4+</option>       
        </select>

        </div>
</form>

 <center> <a href="{{url('/enviarmail')}}" class="btn btn-xs btn-info" title="enviar mail">  
                    <span class="glyphicon glyphicon-envelope" ></span> </a></center>
   <script type="text/javascript">
        setTimeout(function(){
            $(".alert").fadeOut(1500);

        },1500);
    
   </script>


@stop