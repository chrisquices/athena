<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ClausulaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clausulas')->insert([[
            'nombre' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque hendrerit lorem vel nunc vestibulum, in venenatis nibh imperdiet. Curabitur consequat ultricies bibendum.',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'nombre' => 'Duis a nisl ornare, volutpat dui at, finibus arcu. Fusce molestie mollis odio imperdiet maximus. Aliquam erat volutpat. ',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'nombre' => 'Mauris molestie pharetra dui eget condimentum. Phasellus ut elit risus. Proin sollicitudin bibendum ornare. In hac habitasse platea dictumst.',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'nombre' => 'Vivamus luctus justo in sodales accumsan. Proin vel eros lacinia, facilisis lorem eu, pharetra purus.',
            'created_at' => now(),
            'updated_at' => now(),
        ]]);
    }
}
