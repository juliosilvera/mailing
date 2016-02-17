@extends('main')

@section('body')
<?php
set_time_limit(0);
ini_set('memory_limit', '-1');		
?>
<center>
	<h4>Enviar Mailing</h4>
	<h4>Grupos de Envio</h4>
</center>
<form action="send_camp" method="post">
<table align="center" border="1">
	<tr>
		<td>
			Marque los grupos de envio
		</td>
		<td>
			Grupos
		</td>
	</tr>
	<?php
	$grupos = DB::table('grupos')->get();
	foreach ($grupos as $grupo) {
		echo "<tr><td><input type='checkbox' name='grupo[]' value='" . $grupo->id . "'></td><td>" . $grupo->grupo . "</td></tr>";
	}
	?>
</table>
<center>
<h4>Campaña</h4>
<select name="camp">
	<option>Sellecione</option>
	<?php
	$camps = DB::table('campanias')->get();
	foreach ($camps as $camp) {
		echo "<option value='" . $camp->id . "'>" . $camp->nombre . "</option>";
	}
	?>
</select>
<br>
	<br>
<input type="submit" value="Enviar Correos">
</form>
	<br>
	<br>
	<a href="admin"><img src="img/volver.gif" style="width:80px"></a>
</center>
@stop