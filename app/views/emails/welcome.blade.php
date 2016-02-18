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
    echo "<img src='http://186.101.31.51/images/check_mailing?codigo=".$codigo."' style='visibility: hidden'>";
	echo "<center>Si no desea seguir recibiendo noticias nuestra hacer click <a href='http://mailing.gotrade.com.ec/delete/check_mailing?codigo=".$codigo."'>AQUI</a></center>";
}
?>
    </body>
</html>
