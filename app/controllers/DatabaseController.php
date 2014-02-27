<?php

class DatabaseController extends \BaseController {

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
		$zip_path = public_path()."/tmp/";
		if(!File::isDirectory($zip_path))
			File::makeDirectory($zip_path, 0777, true, true);

		$zip = new ZipArchive();
		$zip->open($zip_path.$zip_name, ZIPARCHIVE::CREATE | ZIPARCHIVE::OVERWRITE) or die ("ERROR: Could not create zip");
		$zip->addFromString("clients.json", $clients->toJson()) or die ("ERROR: Could not add json clienti");
		$zip->addFromString("appointments.json", $appointments->toJson()) or die ("ERROR: Could not add json appuntamenti");
		$zip->close();
		
		// header('Content-type: application/zip');
		// header('Content-Disposition: attachment; filename="'.$zip_name.'"');
		// readfile($zip_path);
		// unlink($zip_path);

        return Response::download($zip_path.$zip_name, $zip_name);
	}

	// db/import
	public function import()
	{
		return View::make('db-import');
	}

	//  db/erase
	public function erase(){
		DB::table('appointments')->delete();
		DB::table('clients')->delete();
		return Redirect::route('client-all');
	}

	/*
	|--------------------------------------------------------------------------
	| POST REQUESTS
	|--------------------------------------------------------------------------
	*/

	// db/import-execute
	public function importExecute()
	{
		$zip_path = public_path()."/tmp/";
		$file = null;

		if(Input::hasFile('upload')){
			if(Input::file('upload')->getClientOriginalExtension()!=="zip") return "No valid file Uploaded";
			$file = Input::file('upload');
			$orig_name = $file->getclientOriginalName();
			$file->move($zip_path,$orig_name);

			$zip = new ZipArchive;
			$res = $zip->open($zip_path.$orig_name);
			$zip->extractTo($zip_path."import");
			$zip->close();
			unlink($zip_path.$orig_name);
			// Inserting clients
			$clients = json_decode(File::get($zip_path."import/clients.json"));
			DB::table('appointments')->delete();
			DB::table('clients')->delete();
			foreach ($clients as $obj) {
				$client = new Client;
				$client->id = $obj->id;
				$client->name = $obj->name;
				$client->surname = $obj->surname;
				$client->nikname = $obj->nikname;

				$client->phone = $obj->phone;
				$client->mobilephone = $obj->mobilephone;

				$client->note = $obj->note;

				$client->created_at = $obj->created_at;
				$client->updated_at = $obj->updated_at;
				$client->deleted_at = $obj->deleted_at;

				$client->save();
				$client = null;
			}
			$apps = json_decode(File::get($zip_path."import/appointments.json"));
			foreach ($apps as $obj) {
				$app = new Appointment;
				$app->id = $obj->id;
				$app->client_id = $obj->client_id;
				$app->action = $obj->action;
				$app->date = $obj->date;
				$app->description = $obj->description;

				$app->created_at = $obj->created_at;
				$app->updated_at = $obj->updated_at;
				$app->deleted_at = $obj->deleted_at;

				$app->save();
				$app = null;
			}
			$params = array(
				'numero_clienti' => count($clients),
				'numero_app' => count($apps)
			);
		return View::make('db-import-execute',$params)->with(compact('client'));

		}else
			return "No file Uploaded";

	}

}
