<?php
class SaveCamp{
	public function guardar(){
		DB::table('campanias')->insert(
    array('nombre' => Input::get('nombre'), 'texto' => Input::get('texto'))
);
	}
}