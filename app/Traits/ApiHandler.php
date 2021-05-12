<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Validation\ValidatesRequests;


trait ApiHandler{

	//as we all know, 200 is our success message, so this is hardresponseCoded in
  protected function successResponse($data, $message = 'Success', $responseCode = 200)
	{
		return response()->json([
			'status'=> 'success',
			'message' => $message,
			'data' => $data,
		], $responseCode);
	}

	//we will pass the response code if it is an error
	protected function errorResponse($message = 'Uh oh..Something bad happened', $responseCode) //we should always send a msg as parameter here
	{
		return response()->json([
			'status'=>'error',
			'message' => $message, //could be array/object
			'data' => null,
		], $responseCode);
	}

}
