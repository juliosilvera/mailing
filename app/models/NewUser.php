<?php
class NewUser{
	public function crear_user(){
		DB::table('users')->insert(
    array('username' => Input::get('username'), 'email' => Input::get('email'), 'password' => Hash::make(Input::get('password')), 'type' => Input::get('type'))
    
);
	
	}
}