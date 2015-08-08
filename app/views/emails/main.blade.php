<!DOCTYPE html>
<html>

    <!-- This code is only meant for previewing your Reflow design. -->

    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale = 1.0,maximum-scale = 1.0">
    </head>
    <body>
    <?php
$contenido = DB::table('campanias')->where('id', $id)->get();
foreach ($contenido as $cont) {
	echo $cont->texto;
}
?>
    </body>
</html>