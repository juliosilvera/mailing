<?php
class CrearGrupo{
	public function nuevoGrupo(){
		DB::table('grupos')->insert(
    array('grupo' => Input::get('grupo'))
);
	}
}