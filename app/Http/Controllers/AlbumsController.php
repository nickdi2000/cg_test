<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Albums;

class AlbumsController extends Controller
{

		public function index(){
			return Albums::all();
		}

		public function update(Request $request)
    {

    }
}
