<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projects = config("projects");

        foreach ($projects as $project) {
            $newProject = new Project();
            $newProject->title = $project['title'];
            $newProject->description = $project['description'];
            $newProject->artist = $project['artist'];
            $newProject->imgPath = '/uploads/placeholder.avif';
            $newProject->save();
        }
    }
}
