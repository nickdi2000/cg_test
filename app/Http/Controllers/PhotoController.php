<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Photos;
use App\Http\Controllers\ApiController;

class PhotoController extends ApiController
{

		public function index(){
			return Photos::all();
		}

		protected $model = Photos::class;

    public function like(Request $request)
    {
        $photo = Photos::findOrFail($request->id);
				$photo->featured = !$photo->featured;
        $record = tap($photo)->update($request->only('featured'));
				return $this->successResponse($record);
    }
}
