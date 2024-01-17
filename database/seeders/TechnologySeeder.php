<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use illuminate\Support\Str;
use App\Models\Technology;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $technologies = ['Laravel', 'PHP', 'Html'];
        foreach ($technologies as $value) {
            $newTechnology = new Technology();
            $newTechnology->name = $value;
            $newTechnology->slug = Str::slug($value, '-');
            $newTechnology->save();
        }
    }
}
