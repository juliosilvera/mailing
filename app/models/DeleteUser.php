<?php
class DeleteUser{
	public function borrarUser(){
		
		$emails = Input::get('email');
		foreach ($emails as $email) {
			DB::table('correos')->where('id', $email)->delete();
		}
	}
}