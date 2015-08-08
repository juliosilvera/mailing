@extends('main')

@section('body')
<center>
	<h4>Listas de Envio</h4>
</center>
<table align="center">
	<tr>
		<td>
			Crear Nuevo Grupo
		</td>
		<td style="width:50px"></td>
		<td>
			Modificar Grupo Creado
		</td>
	</tr>
	<tr>
		<td>
			<a href="crearGrupo"><img src="img/crearGrupo.jpg" style="width:120px"></a>
		</td>
		<td></td>
		<td>
			<a href="modificar_grupo"><img src="img/modificar.jpeg" style="width:120px"></a>
		</td>
	</tr>
</table>
<center>
	<br>
	<br>
	<a href="admin"><img src="img/volver.gif" style="width:80px"></a>
</center>
@stop