<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Photographer;
use App\Http\Controllers\ApiController;

class PhotoGrapherController extends ApiController
{
		protected $model = Photographer::class;
		protected $resource = 'phographers';

		public function index(){
			return Photographer::all();
		}

		public function show($id){
			return $this->successResponse(Photographer::findOrFail($id));
		}

		public function update($id, Request $request)
    {
				$validateFields = [
					'phone' => 'required|max:12', //obviously we'd want an actual phone syntax filter here
					'email' => 'required',
				];

				$validation = $this->validateRecord($validateFields);
				 if($validation->fails()){
            return $this->errorResponse($validation->messages(), 422); //422 because the server gets what were doing, its just wrong
        }

				  $record = Photographer::findOrFail($id);
		      $data = $request->toArray();

		      $record->update($data);
		      $record->save();

					return $this->successResponse($record, 'Photographer Succesfully Saved!', 201);

    }



}
