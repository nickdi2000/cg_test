<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->id();
						$table->bigInteger('album_id')->unsigned();
						$table->string('title');
						$table->text('description');
						$table->date('date');
						$table->string('img');
						$table->boolean('featured')->default(false);

							$table->foreign('album_id')
								->references('id')
								->on('photos')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('photos');
    }
}
