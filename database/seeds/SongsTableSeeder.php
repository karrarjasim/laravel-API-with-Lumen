<?php

use Illuminate\Database\Seeder;
use App\Song;
class SongsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $songs = factory(Song::class, 10)->create();

    }
}
