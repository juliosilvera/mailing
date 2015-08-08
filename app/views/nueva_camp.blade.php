@extends('main')

@section('body')
<center>
	<h4>Nueva Campaña</h4>
	Nombre de la Campaña:
	<form action="save_camp" method="post">
		<input type="text" name="nombre"><br>
		<textarea name="texto"></textarea><br>
		<input type="submit" value="Guardar Campaña">
	</form>
	<br>
	<br>
	<a href="crear_correo"><img src="img/volver.gif" style="width:80px"></a>
</center>
<script>
   CKEDITOR.replace( 'texto' );
</script>
@stop