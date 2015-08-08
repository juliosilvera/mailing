<?php
class AddUserToGroup{
	public function agregarUsuario(){
		$emails = Input::get('email');
		foreach ($emails as $email) {
			DB::table('correos')->insert(
  			  array('group_id' => Input::get('grupo'), 'email' => $email, 'send' => 'no', 'check' => 'no')
			);
		}
	}
}