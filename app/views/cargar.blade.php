@extends('main')

@section('body')
<h4>Carga de aperturas</h4>
<form action="cargar_vistas" method="post">
<select name="camp">
	<option>Campañas</option>
	<?php
		$campanias = DB::table('campanias')->get();
		foreach ($campanias as $camp) {
			echo "<option value='".$camp->nombre."'>".$camp->nombre."</option>";
		}
	?>
</select>
<input type="text" id="datepicker" name="fecha">
<input type="text" name="vistas">
<input type="submit" value="Guardar">
</form>

@stop