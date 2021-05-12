<?php

// there's not much here yet, but it's good to have in place in case we need further general API functionality that the child classes will use,
// for now we are calling the ApiHandler so it doesn't need to be called in all API controllers.  We also have the base validation function that will process the fields if necessary

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;

use App\Traits\ApiHandler;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    use ApiHandler;

		 public function validateRecord($data){
        return Validator::make(request()->all(), $data);
    }

}
