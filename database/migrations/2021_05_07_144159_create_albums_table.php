<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models;

class CreateAlbumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
				// in looking at the landscapes.json, the album has no data other than the child records of photos
        Schema::create('albums', function (Blueprint $table) {
            $table->id();
						$table->bigInteger('photographer_id')->unsigned();

						$table->foreign('photographer_id')
								->references('id')
								->on('albums')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('albums');
    }
}
