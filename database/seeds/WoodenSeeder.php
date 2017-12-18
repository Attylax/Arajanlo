<?php

use Illuminate\Database\Seeder;
use App\Models\wooden;

class WoodenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        wooden::create(['name' => 'Tolgy', 'Wooden_typeID' => '1']);
        wooden::create(['name' => 'Bukk', 'Wooden_typeID' => '1']);
        wooden::create(['name' => 'Cserfa', 'Wooden_typeID' => '1']);
        wooden::create(['name' => 'Feher Fenyo', 'Wooden_typeID' => '2']);
        wooden::create(['name' => 'Voros Fenyo', 'Wooden_typeID' => '2']);
        wooden::create(['name' => 'Dummy', 'Wooden_typeID' => '3']);
    }
}
