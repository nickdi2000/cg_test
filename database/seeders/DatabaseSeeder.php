<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\DB;
use Illuminate\Support\Facades\File;

use App\Models\Photos;
use App\Models\Albums;
use App\Models\Photographer;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
				Photos::truncate();
				$json = File::get('database/data/photos.json');
				$data = json_decode($json);

				foreach ($data as $obj) {
					Photos::create(array(
						'id' => $obj->id,
						'title' => $obj->title,
						'description' => $obj->description,
						'img' => $obj->img,
						'date' => $obj->date,
						'featured' => $obj->featured,
						'album_id' => 1 //not from JSON but we'll need this when using as seed, otherwise it would auto generate incrementally

					));
				}
						Albums::truncate();
						Albums::create(array(
							  "photographer_id" => 1,
							));

					Photographer::truncate();
					Photographer::create(array(
						  "name" => "Nick Reynolds",
						  "phone" => "555-555-5555",
						  "email" => "nick.reynolds@domain.co",
						  "bio" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ",
						  "profile_picture" => "img/profile.jpeg"
						));

    }
}
