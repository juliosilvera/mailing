<?php
class Revisados{
	
	public function codigos(){
	$campania = 'Evita Problemas Tributarios';
	$camp_name = str_replace(' ', '_', $campania);
	$count = DB::table('correos')->where('camp', $campania)->get();
	$code = 0;
	foreach ($count as $key) {
		$code = $code + 1;
		$codigo = $camp_name . "_" . $code;

	DB::table('correos')
            ->where('id', $key->id)
            ->update(array('codigo' => $codigo));
	}
	
	}
	
}