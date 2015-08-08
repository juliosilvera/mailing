@extends('main')

@section('body')
<center>
	<h4>Agregar Usuarios</h4>
	Seleccione Grupo: 
	<form action="addUserGroup" method="post">
	<select name="grupo">
		<option>Grupos</option>
		<?php
		$grupos = DB::table('grupos')->get();
		foreach ($grupos as $grupo) {
			echo "<option value='" . $grupo->id . "'>" . $grupo->grupo . "</option>";
		}
		?>
	</select><br>
	<input type="email" name="email[]" id="1">
	<input type="button" id="agregar" value="Agregar Campo">
	<input type="submit" value="Cargar Usuarios">
	</form>
	<br>
	<br>
	<a href="modificar_grupo"><img src="img/volver.gif" style="width:80px"></a>
</center>
<script>
	$( "#agregar" ).click(function() {
    
     
        $("#1").after("<input type='email' name='email[]' id='1'>");
  
});
</script>
@stop