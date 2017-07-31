<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Listado de Documentos</title>
</head>
<body>
    <h1>Listado de Documnetos</h1>
    <hr>
      @foreach($recursos as $r)
      {{$r->nombre}} <br>
      @endforeach
	
</body>
</html>