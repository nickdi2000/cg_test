<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photos extends Model
{
		public $timestamps = false;
    use HasFactory;

		public function albums()
    {
        return $this->belongsTo(Albums::class);
    }

}
