<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>CRM</title>
	<link rel="stylesheet" href="{{asset("css/bootstrap.css")}}">
	<script src="{{asset("js/jquery-3.2.1.js")}}"></script>
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{url('/')}}">
      	<span class="glyphicon glyphicon-home" aria-hidden="true"></span>
      	

      </a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">ITC <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Esau-Emmanuel</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Opciones <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
          <li><a href="{{url('/registrarProyecto')}}">Registrar Proyectos</a></li>
            <li><a href="{{url('/consultarProyectos')}}">Consultar Proyectos</a></li>
            <li><a href="{{url('/registrarRecursos')}}">Registrar recursos</a></li>
            <li><a href="{{url('/consultarRecursos')}}">Consultar Recursos</a></li> 
            <li><a href="{{url('/registroUsuario')}}">Registrar Usuarios</a></li>
            <li><a href="{{url('/consultarUsuarios')}}">Consultar Usuarios</a></li>
            <li><a href="{{url('/registroPromocion')}}">Registrar promoción</a></li>
            <li><a href="{{url('/consultarPromocion')}}">Consultar promoción</a></li>


            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Buscar</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
      </ul>
    </div>
  </div>
</nav>
 
 <div class="container">
 	<div class="row">
 		<div class="col-xs-12">
 			@yield('contenido')
 		</div>
 	</div>
 </div>

	

<footer class="text-center">
    <hr> Negocios Electronicos &copy;2017
	
</footer>
<script src="{{asset("js/bootstrap.js")}}"></script>
</body>
</html>