<?php

use Illuminate\Database\Seeder;
use App\Models\finish;

class FinishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        finish::create(['name' => 'Lakk']);
        finish::create(['name' => 'Dummy1']);
        finish::create(['name' => 'Dummmy2']);
    }
}
