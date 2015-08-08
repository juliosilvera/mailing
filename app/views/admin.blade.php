@extends('main')

@section('body')
<center>
	<h4>Pantalla de Administracion</h4>
</center>
	<table align="center">
		<tr>
			<td>
				Crear Nuevo Usuario
			</td>
			<td style="width:50px"></td>
			<td>
				Crear Lista de Envio
			</td>
			<td style="width:50px"></td>
			<td>
				Crear Correo 
			</td>
			<td style="width:50px"></td>
			<td>
				Enviar Correos
			</td>
			<td style="width:50px"></td>
			<td>
				Reportes
			</td>
		</tr>
		<tr>
			<td>
				<a href="crear_usuario"><img src="img/new_user.png"></a>
			</td>
			<td></td>
			<td>
				<a href="lista"><img src="img/lista.gif" style="width:128px"></a>
			</td>
			<td></td>
			<td>
				<a href="crear_correo"><img src="img/mail_add.png"></a>
			</td>
			<td></td>
			<td>
				<a href="send_mail"><img src="img/enviar.png" style="width:120px"></a>
			</td>
			<td></td>
			<td>
				<form action="reportes" method="post">
				<select name="camp">
					<option>Campañas</option>
					<?php
			$camps = DB::table('campanias')->get();
			foreach ($camps as $camp) {
				echo "<option value='" . $camp->nombre . "'>" . $camp->nombre . "</option>";
			}
			?>
				</select>
				<br>
				<br>
				<input type="submit" value="Ver Reportes">
			</form>
			</td>
		</tr>
	</table>
<a href="logout"><img src="img/logout.png" style="width:50px" alt="Salir"></a>
@stop
