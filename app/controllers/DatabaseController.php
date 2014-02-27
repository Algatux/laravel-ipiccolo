<?php

class DatabaseController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| GET REQUESTS
	|--------------------------------------------------------------------------
	*/

	// db/export
	public function export()
	{
		$clients = Client::withTrashed()->get();
		$appointments = Appointment::withTrashed()->get();

		$zip_name = "ipiccolo-db.zip";
		$zip_path = public_path()."/tmp/".$zip_name;

		$zip = new ZipArchive();
		$zip->open(public_path()."/tmp/".$zip_name, ZIPARCHIVE::CREATE | ZIPARCHIVE::OVERWRITE) or die ("ERROR: Could not create zip");
		$zip->addFromString("clients.json", $clients->toJson()) or die ("ERROR: Could not add json clienti");
		$zip->addFromString("appointments.json", $appointments->toJson()) or die ("ERROR: Could not add json appuntamenti");
		$zip->close();
		
		header('Content-type: application/zip');
        header('Content-Disposition: attachment; filename="'.$zip_name.'"');
        readfile($zip_path);
        unlink($zip_path);

        //return Response::download(public_path()."/tmp/".$zip_name, $zip_name);
	}

	// db/import
	public function import()
	{
		
	}

	/*
	|--------------------------------------------------------------------------
	| POST REQUESTS
	|--------------------------------------------------------------------------
	*/

	// db/import-execute
	public function importExecute()
	{
		
	}

}
