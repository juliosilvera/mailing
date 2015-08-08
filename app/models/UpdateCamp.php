<?php
class UpdateCamp{
	public function update(){
		DB::table('campanias')
            ->where('id', Input::get('id'))
            ->update(array('nombre' => Input::get('nombre'), 'texto' => Input::get('texto')));
	}
}