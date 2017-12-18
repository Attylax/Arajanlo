<?php

use Illuminate\Database\Seeder;
use App\Models\wooden_type;

class WoodenTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        wooden_type::create(['name' => 'tulevelu', 'unit' => '1']);
        wooden_type::create(['name' => 'lombhullatp', 'unit' => '1']);
        wooden_type::create(['name' => 'dummy', 'unit' => '1']);
    }
}
