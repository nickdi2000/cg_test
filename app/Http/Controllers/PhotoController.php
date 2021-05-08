<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Photos;

class PhotoController extends Controller
{

		public function index(){
			return Photos::all();
		}

		public function update(Request $request)
    {

    }
}
