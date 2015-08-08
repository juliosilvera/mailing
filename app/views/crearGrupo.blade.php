@extends('main')

@section('body')
<center>
	<h4>Crear Grupo de Envio</h4>
	<form action="crear_grupo" method="post">
		<input type="text" name="grupo">
		<input type="submit" value="Crear Grupo">
	</form>
	<br>
	<br>
	<a href="lista"><img src="img/volver.gif" style="width:80px"></a>
</center>
@stop