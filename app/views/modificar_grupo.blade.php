@extends('main')

@section('body')
<center>
	<h4>Modificar Grupos</h4>
</center>
<table align="center">
	<tr>
		<td>
			Agregar Usuarios
		</td>
		<td style="width:50px"></td>
		<td>
			Eliminar Usuarios
		</td>
	</tr>
	<tr>
		<td>
			<a href="agregar_usuario_grupo"><img src="img/add_user.png" style="width:120px"></a>
		</td>
		<td></td>
		<td>
			<a href="modificar_usuario_grupo"><img src="img/delete_user.jpg" style="width:120px"></a>
		</td>
	</tr>
</table>
<center>
	<br>
	<br>
	<a href="lista"><img src="img/volver.gif" style="width:80px"></a>
</center>
@stop