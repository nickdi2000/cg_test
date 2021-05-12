<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Albums extends Model
{
		public $timestamps = false;
    use HasFactory;

		protected $resource = 'albums';
		protected $modelName = "Album";

		protected $fillable = [
        'photographer_id',
    ];

		public function photographer()
		{
		    return $this->belongsTo(Photographer::class);
		}

		public function photos()
    {
        return $this->hasMany(Photos::class, 'album_id', 'id');
    }

}
