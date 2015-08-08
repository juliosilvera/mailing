@extends('main')

@section('body')
<center>
	<h4>Campañas</h4>
</center>
<table align="center">
	<tr>
		<td>
			Crear Nueva Campaña
		</td>
		<td style="width:50px"></td>
		<td>
			Modificar Campaña
		</td>
	</tr>
	<tr>
		<td>
			<a href="nueva_camp"><img src="img/agregar_campana.png" style="width:120px"></a>
		</td>
		<td></td>
		<td>
			<a href="modificar_camp"><img src="img/modif-datos.jpg"></a>
		</td>
	</tr>
</table>
<center>
	<br>
	<br>
	<a href="admin"><img src="img/volver.gif" style="width:80px"></a>
</center>

@stop