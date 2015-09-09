<?php

class SendMail {
	
	public function enviar(){
	$camps = DB::table('campanias')->where('id', Input::get('camp'))->get();
	foreach ($camps as $camp) {
		$campania = $camp->nombre;
		$id = $camp->id;
		$attach = $camp->attach;
		$from_email = $camp->bouncing;
		$from_name = $camp->sender;
	}
	$grupos = Input::get('grupo');
	foreach ($grupos as $grupo) {
		$correos = DB::table('correos')->where('group_id', $grupo)->where('send', 'no')->whereBetween('id', array(137, 1137))->get();
		foreach ($correos as $correo) {
			$email = $correo->email;
			$id_email = $correo->id;
			$codigo = $correo->codigo;
			$data = array(
	'id' => $id, 'codigo' => $codigo);
	Mail::send('emails.welcome', $data, function($message) use ($correo, $campania, $from_email, $from_name)
{
	$message->from($from_email, $from_name)
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