<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

        $technology_ids = Technology::all()->pluck('id')->all();

        $slug_list = [];
        for ($i = 0; $i < 50; $i++) {

            $name = $faker->word();
            $slug = $name;
            $n = 0;
            do {
                if (in_array($slug, $slug_list)) {
                    $n++;
                    $slug = $name . '-' . $n;
                }
            } while (in_array($slug, $slug_list));

            $slug_list[] =$slug;

            $project = new Project();

            $project->name = $name;
            $project->slug = Str::slug($slug);
            $project->url = $faker->url();
            $project->description = $faker->paragraph();
            $project->state = $faker->randomElement($project_state);
            $project->priority = $faker->numberBetween(1, 5);
            $project->date = $faker->date();

            $project->type_id = $faker->optional()->randomElement($type_ids);

            $project->save();

            $random_technology_ids =  $faker->randomElements($technology_ids, null);
            $project->technologies()->attach($random_technology_ids);
        }
    }
}
