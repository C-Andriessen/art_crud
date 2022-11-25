<?php

namespace Database\Seeders;

use App\Models\Art;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 50; $i++)
        {
            Art::create(['title' => 'title' . $i, 'image' => 'image' . $i]);
        }
    }
}
