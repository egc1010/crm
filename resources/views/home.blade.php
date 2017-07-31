@extends('master')

@section('contenido')
@include('flash::message')

<div class="jumbotron">
  <h1>CRM</h1>
  <img style='display:block; width:800px;height:250px;' id='base64image'                 

   src="{{asset('img/logo.png')}}" >
  		
  
  <p><a href="{{url('/preRegistro')}}" 	class="btn btn-primary btn-lg">Registrarse</a></p>
</div>
<script type="text/javascript">
        setTimeout(function(){
        	$(".alert").fadeOut(1500);

        },1500);
 </script>
@stop

