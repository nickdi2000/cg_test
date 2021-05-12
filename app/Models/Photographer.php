<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photographer extends BaseModel
{
		public $timestamps = false;
	  use HasFactory;

		protected $resource = 'photographers';
		protected $modelName = 'Photographer';

		protected $fillable = [
			'name','phone','email','bio','profile_picture'
		];

		//if I were to start this project over, I would have had a "profile" module that could be referred to dynamically so we wouldn't need to override the parent getEdit here.
		public function getEditPathAttribute(){
				return $this->getBasePath() . 'profile/' . $this->id . '/edit';
		}

}
