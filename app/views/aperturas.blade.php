@extends('main')

@section('body')
<center><h4>Correos que revisaron campaña <?php echo $_POST['camp'];  ?></h4>
<table border="1">
	<tr>
		<td>
			Correos
		</td>
		<td>
			Campaña
		</td>
		<td>
			Fecha
		</td>
	</tr>
	<?php
	$correos = DB::table('correos')->where('camp', Input::get('camp'))->where('check', 'si')->get();
	foreach ($correos as $correo) {
		echo "<tr><td>".$correo->email."</td><td>".$correo->camp."</td><td>".$correo->fecha."</td></tr>";
	}
	?>
</table>
<br>
  <br>
  <center><a href="supervisor"><img src="img/volver.gif" style="width:80px"></a></center>
</center>

@stop