<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Albums;
use App\Http\Controllers\ApiController;

class AlbumsController extends ApiController
{
		protected $model = Albums::class;
		protected $resource = 'albums';

		public function index(){
			$data = Albums::with('photos')->find(1);
			return $this->successResponse($data);
		}

}
