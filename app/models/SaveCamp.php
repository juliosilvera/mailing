<?php
class SaveCamp{
	public function guardar(){
		DB::table('campanias')->insert($_POST);
	}
}