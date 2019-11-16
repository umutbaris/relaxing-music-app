<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	
	public function sendSuccess($data = [], $statusCode = 200)
	{
		return response()->json([
			'success' => true,
			'data' => $data
		], $statusCode);
	}

	public function sendError($message, $statusCode = 500)
	{
		return response()->json([
			'success' => false,
			'error' => $message
		], $statusCode);
	}
}
