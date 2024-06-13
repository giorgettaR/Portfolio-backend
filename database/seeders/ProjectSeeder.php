<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            $project = new Project();

            $project->title = 'Progetto';
            $project->slug = Str::slug('Progetto');
            $project->description = 'Questo progetto è molto bello, mi piace davvero questo progetto.';
            $project->repository_link = 'https://github.com/giorgettaR/laravel_auth';
            $project->languages = 'php';
            $project->softwares = 'Visual Studio Code';
            $project->authors = 'Roberto Giorgetta';
            $project->image_link = 'https://m.media-amazon.com/images/I/81ldgERfzaL._AC_UF1000,1000_QL80_.jpg';

            $project->save();
    }
}
