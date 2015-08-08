@extends('main')

@section('body')
<center>
	<h4>Modificar Campaña</h4>
	<form>
		<select name="camp">
			<option>Campañas</option>
			<?php
			$camps = DB::table('campanias')->get();
			foreach ($camps as $camp) {
				echo "<option value='" . $camp->id . "'>" . $camp->nombre . "</option>";
			}
			?>
		</select>
		<input type="submit" value="Cargar Campaña">
	</form>
	<br><br>
	Nombre de la Campaña:
	<?php
	$updates = DB::table('campanias')->where('id', Input::get('camp'))->get();
	$nombre = "";
	$texto = "";
	$id = "";
	foreach ($updates as $update) {
		$nombre = $update->nombre;
		$texto = $update->texto;
		$id = $update->id;
	}
	?>
	<form action="update_camp" method="post">
		<input type="text" name="nombre" value="{{$nombre}}"><br>
		<textarea name="texto">{{$texto}}</textarea><br>
		<input type="submit" value="Guardar Campaña">
		<input type="hidden" name="id" value="{{$id}}">
	</form>
	<br>
	<br>
	<a href="crear_correo"><img src="img/volver.gif" style="width:80px"></a>
</center>
<script>
   CKEDITOR.replace( 'texto' );
</script>
@stop