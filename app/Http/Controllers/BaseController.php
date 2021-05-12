<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Albums;

class BaseController extends Controller
{

		public function index(){
			return $this->model::all();
		}

		public function update (Request $request)
		{
		 	 $data = $request->toArray();
			 $record = $this->model::create($data);
			 $record->save();

			 return response()->json(['message' => ' Successfully saved.'])->setStatusCode(201);

		}

}
