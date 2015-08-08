<?php
class New_excel{
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
		}

    });

})->export('xls');
	}
}