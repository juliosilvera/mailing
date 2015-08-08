@extends('main')

@section('body')
<center>
	<h4>Crear Nuevo Usuario</h4>
	<form action='new_user' method='post'>
	<input type='text' name='username' placeholder='Nombres'>
	<input type='email' name='email' placeholder='E-mail'>
	<input type='password' name='password' placeholder='Clave'>
	<select name="type">
		<option value="admin">Administrador</option>
		<option value="supervisor">Cliente</option>
	</select>
	<input type='submit' value='Guardar'>
	</form>
	<br>
	<br>
	<a href="admin"><img src="img/volver.gif" style="width:80px"></a>
</center>
@stop