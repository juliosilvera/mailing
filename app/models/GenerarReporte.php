<?php

class GenerarReporte{
	public function reporte(){
		$fecha = date('Y-m-d');
		$verificar = DB::table('reportes')->where('fecha', $fecha)->count();
		if ($verificar != 0) {
			DB::table('reportes')->where('fecha', $fecha)->delete();
		}
		$user = DB::table('campanias')->where('nombre', $campania)->get();
		foreach ($user as $get) {
 		 $usuario = $get->boucing;
 		 $clave = $get->pass;
		}
		$mbox = imap_open("{rsb48.rhostbh.com:993/imap/ssl}INBOX", "emailing@freerisk.com.ec", "EdinIsra7#");
		$MC = imap_check($mbox);
	// Fetch an overview for all messages in INBOX
	$result = imap_fetch_overview($mbox,"1:{$MC->Nmsgs}",0);
	foreach ($result as $reporte) {
		$recibido = new DateTime($reporte->date);
		$recibido2 = $recibido->format('Y-m-d');
		$nombre = $reporte->subject;
		DB::table('reportes')->insert(
    array('nombre' => $nombre, 'fecha' => $fecha, 'recibido' => $recibido2)
	);
	}
	imap_close($mbox);
	}
}