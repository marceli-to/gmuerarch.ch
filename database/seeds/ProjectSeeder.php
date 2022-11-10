<?php
namespace Database\Seeders;
use App\Models\Project;
use App\Models\CategoryProject;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $faker = \Faker\Factory::create();

    for($i = 0; $i<=10; $i++)
    {
      $project = Project::create([
        'title' => [
          'de' => $faker->sentence(4, true),
          'en' => $faker->sentence(5, true)
        ],
        'subtitle' => [
          'de' => $faker->sentence(6, true),
          'en' => $faker->sentence(7, true)
        ],
        'abstract' => [
          'de' => $faker->realText(80, 2),
          'en' => $faker->realText(75, 3)
        ],
        'text' => [
          'de' => $faker->realText(200, 2),
          'en' => $faker->realText(150, 3)
        ],
      ]);

      $rand = mt_rand(1,3);
      CategoryProject::create([
        'project_id' => $project->id,
        'category_id' => $rand
      ]);
    }
  }
}