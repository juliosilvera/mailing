<?php

class SendMail {
	
	public function enviar(){
	$camps = DB::table('campanias')->where('id', Input::get('camp'))->first();
	
		$campania = $camps->nombre;
		$id = $camps->id;
		$attach = $camps->attach;

	
	$grupos = Input::get('grupo');
	foreach ($grupos as $grupo) {
		
		$correos = DB::table('correos')->where('group_id', $grupo)->where('send', 'no')->get();
			foreach ($correos as $correo) {
			$email = $correo->email;
			$id_email = $correo->id;
			$codigo = $correo->codigo;
			$data = array(
				'id' => $id, 'codigo' => $codigo);
				Mail::send('emails.welcome', $data, function($message) use ($correo, $campania)
				{
			  	$message->to($correo->email, '')
			          ->subject($campania);
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