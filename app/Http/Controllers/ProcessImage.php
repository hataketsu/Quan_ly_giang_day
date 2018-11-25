<?php

namespace App\Http\Controllers;

use Faker\Provider\DateTime;
use Illuminate\Support\Carbon;

trait ProcessImage {
	public function process_image( $file ) {
		$destinationPath = "uploads";
		$name            = md5( $file->getClientOriginalName() ) . "_" . Carbon::now()->timestamp
		                   . "." . pathinfo( $file->getClientOriginalName(), PATHINFO_EXTENSION );
		$file->move( $destinationPath,
			$name );

		return $name;
	}
}