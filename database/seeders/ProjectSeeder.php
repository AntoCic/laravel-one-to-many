<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $project_state = ['Done', 'Just started', 'Stuck', 'In progress', 'Delated'];

        $type = Type::all();
        $type_ids = $type->pluck('id')->all();

        for ($i = 0; $i < 50; $i++) {

            $project = new Project();

            $project->name = $faker->word();
            $project->url = $faker->url();
            $project->description = $faker->paragraph();
            $project->state = $faker->randomElement($project_state);
            $project->priority = $faker->numberBetween(1, 5);
            $project->date = $faker->date();
            
            $project->type_id = $faker->randomElement($type_ids);

            $project->save();
        }
    }
}
