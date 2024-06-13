<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = ['PHP', 'JavaScript', 'CSS', 'HTML', 'Laravel', 'Vite', 'Vue', 'Blade'];

        foreach ($technologies as $technology_name) {

            $new_technology = new Technology();
            $new_technology->name = $technology_name;
            $new_technology->slug = Str::slug($technology_name);

            $new_technology->save();
        }
    }
}
