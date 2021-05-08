<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Photographer;

class PhotoGrapherController extends Controller
{

		public function index(){
			return Photographer::all();
		}

		public function show($id){
			return Photographer::findOrFail($id);
		}

		public function update(Request $request)
    {

    }
}
