<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photos extends Model
{
		public $timestamps = false;
    use HasFactory;

		protected $resource = 'photos';
		protected $modelName = 'Photo';
		
		protected $fillable = [
			'name','phone','email','bio','profile_picture'
		];

		public function albums()
    {
        return $this->belongsTo(Albums::class);
    }

}
