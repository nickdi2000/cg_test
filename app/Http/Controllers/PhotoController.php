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

    public function like($id)
    {
        $photo = Photos::findOrFail($id);
				$photo->featured = !$photo->featured;
        return tap($photo)->update($request->only('featured'));
    }
}
