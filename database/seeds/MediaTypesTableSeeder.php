<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class MediaTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('media_types')->insert([
           'name' => 'Book',
           'created_at' => Carbon::now(),
           'updated_at' => Carbon::now()
        ]);
        
        DB::table('media_types')->insert([
           'name' => 'Music',
            'created_at' => Carbon::now(),
           'updated_at' => Carbon::now()
        ]);
        
        DB::table('media_types')->insert([
           'name' => 'Video Game',
           'created_at' => Carbon::now(),
           'updated_at' => Carbon::now()
        ]);
        
        DB::table('media_types')->insert([
           'name' => 'Movie',
           'created_at' => Carbon::now(),
           'updated_at' => Carbon::now()
        ]);
        
        DB::table('media_types')->insert([
           'name' => 'TV Series',
           'created_at' => Carbon::now(),
           'updated_at' => Carbon::now()
        ]);
        
        DB::table('media_types')->insert([
           'name' => 'Play',
           'created_at' => Carbon::now(),
           'updated_at' => Carbon::now()
        ]);
        
        DB::table('media_types')->insert([
           'name' => 'Comic',
           'created_at' => Carbon::now(),
           'updated_at' => Carbon::now()
        ]);
    }
}
