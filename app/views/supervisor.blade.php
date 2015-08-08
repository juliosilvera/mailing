@extends('main')

@section('body')
<center>
	<h4>Pantalla de Administracion</h4>
</center>
	<table align="center">
		<tr>
			
			<td>
				Reportes
			</td>
			<td>
				Correos que visualizaron nuestra campaña
			</td>
		</tr>
		<tr>
			<td>
				<form action="reportes_sup" method="post">
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
			<td>
				<form action="aperturas" method="post">
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
