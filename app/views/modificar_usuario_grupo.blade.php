@extends('main')

@section('body')
<center>
	<h4>Eliminar Usuarios</h4>
	<form>
	<select name="grupo">
		<option>Grupos</option>
		<?php
		$grupos = DB::table('grupos')->get();
		foreach ($grupos as $grupo) {
			echo "<option value='" . $grupo->id . "'>" . $grupo->grupo . "</option>";
		}
		?>
	</select>
	<input type="submit" value="Cargar">
	</form>
	<br><br>
	<form action="eliminar_correo" method="post">
	<table>
	<tr>
		<td></td>
		<td>
			E-mail
		</td>
	</tr>
	<?php
	$users = DB::table('correos')->where('group_id', Input::get('grupo'))->get();
	foreach ($users as $user) {
		echo "<tr><td><input type='checkbox' name='email[]' value='" . $user->id . "'></td><td>" . $user->email . "</td></tr>";
	}
	?>
	</table>
	<br>
	<input type="submit" value="Eliminar">
	</form>
	<br>
	<br>
	<a href="modificar_grupo"><img src="img/volver.gif" style="width:80px"></a>
</center>

@stop