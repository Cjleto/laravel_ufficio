<?php

use App\Models\Photo;
use Illuminate\Database\Seeder;

class SeedPhotoTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //DB::STATEMENT('SET FOREIGN_KEY_CHECKS=0');
        //Photo::truncate();
        factory(App\Models\Photo::class, 200)->create();
    }
}
