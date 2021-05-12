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
			 
			 return $this->successResponse($record, $this->modelName . ' Succesfully Saved!', 201);

		}

}
