<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Schema;

class BaseModel extends Model
{

	// lets require the table name
	protected $resource;

	//we can also have a modelName thats easy on the eyes for a human or monkey on the front end -- thumbs up emoticon here.
	protected $modelName;
	
	//if things scaled up, we might need a 'section' or 'module' or something to contain all the different modules (it: admin, public, photos etc)

	public function __construct(array $attributes = [])
	{
		//lets append some restful and ui paths to the model for convenience.  we can add more as the app grows (or add them all now).
		$this->append([
			'indexPath',
			'editPath',
			'updatePath',
			'modelName'
		]);


		parent::__construct($attributes);
	}


	// Allow us to find a model based on slug, convenient for this vue routing stuff we do
	public function scopeSlug($query, $slug){
		return $query->where('slug', $slug)->firstOrFail();
	}


	public function getModelNameAttribute()
	{
		return $this->modelName;
	}

	/* note: normally we might want to throw errors here if the modleName is not defined to make things run smoother, especially if a junior joins the team. */

		protected function getBasePath()
		{
				return '/' . $this->resource . '/';
		}

		public function getIndexPathAttribute(){
			return $this->getBasePath();
		}


		public function getEditPathAttribute(){
			return $this->getBasePath() . $this->id . '/edit';
		}

			public function getUpdatePathAttribute(){
			return '/api' . $this->getBasePath() . $this->id;
		}

}
