@extends('main')

@section('body')
<center><h4>Sistema de Mailing - Login</h4>
<form action="check_login" method="post">
	<input type="email" name="email" placeholder="Usuario"><br>
	<input type="password" name="password" placeholder="Clave"><br>
	<input type="submit" value="Entrar">
</form>
</center>

@stop