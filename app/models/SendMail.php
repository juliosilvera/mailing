<?php

class SendMail {
	
	public function enviar(){
		
	$camps = DB::table('campanias')->where('id', Input::get('camp'))->first();
	
		$campania = $camps->nombre;
		$id = $camps->id;
		$datos = array('attach' => 'files/' . $camps->attach, 'from' => $camps->bouncing);

	
	$grupos = Input::get('grupo');
	foreach ($grupos as $grupo) {
		
		$correos = DB::table('correos')->where('group_id', $grupo)->where('send', 'no')->get();
			foreach ($correos as $correo) {
			$email = $correo->email;
			$id_email = $correo->id;
			$codigo = $correo->codigo;
			$data = array(
				'id' => $id, 'codigo' => $codigo);
				Mail::send('emails.welcome', $data, function($message) use ($correo, $campania, $datos)
				{
		          	$message->from($datos['from'], 'FreeRisk Operaciones');

				    $message->to($correo->email);

				    $message->subject($campania);

				    if($datos['attach'] != "")
				    {
				    	$message->attach($datos['attach']);
				    }
				});
				DB::table('correos')
			            ->where('id', $id_email)
			            ->update(array('send' => 'si'));
			
		
	}

		}
		
}

public function create_excel(){
		Excel::create('Filename', function($excel) {

    $excel->sheet('Sheetname', function($sheet) {

        $sheet->row(1, array(
     		'correos', 'fecha'
		));
		$count = 3;
		$correos = DB::table('correos')->where('check', 'si')->get();
		foreach ($correos as $key) {
			$sheet->row($count, array(
     		$key->email, $key->fecha
		));
			$count = $count + 1;
		}

    });

})->export('xls');
	}
	
}

//->whereBetween('id', array(17, 117))
