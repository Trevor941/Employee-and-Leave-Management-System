<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gender;

class GendersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gender1 = Gender::create([
            'name'=>'Male'
        ]);
        $gender1 = Gender::create([
            'name'=>'Female'
        ]);
    }
}
