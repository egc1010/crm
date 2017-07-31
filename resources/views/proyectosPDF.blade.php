<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Listado de Proyectos</title>
</head>
 @include('flash::message')
<body>
    <h1>Listado de Proyectos</h1>
    <hr>
      @foreach($proyectos as $p)
      {{$p->descripcion}} <br>
      @endforeach
	
</body>
<script type="text/javascript">
        setTimeout(function(){
        	$(".alert").fadeOut(1500);

        },1500);
   	
   </script>
</html>