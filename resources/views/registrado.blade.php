@extends('master')

@section('contenido')
@include('flash::message')



<h1>GRACIAS POR REGISTRARSE EN CRM VIAJES</h1>
  <p><a href="{{url('/')}}" 	class="btn btn-primary btn-lg">Volver</a></p>


 <script type="text/javascript">
        setTimeout(function(){
        	$(".alert").fadeOut(1500);

        },1500);
   	
   </script>

@stop