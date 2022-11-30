<?php
namespace Database\Seeders;
use App\Models\Project;
use App\Models\CategoryProject;
use App\Models\Image;
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
          'de' => $faker->realText(400, 2),
          'en' => $faker->realText(400, 3)
        ],
        'text' => [
          'de' => $faker->realText(500, 2),
          'en' => $faker->realText(450, 3)
        ],
      ]);

      $project->flag('isPublish');

      $rand = mt_rand(1,3);
      CategoryProject::create([
        'project_id' => $project->id,
        'category_id' => $rand
      ]);

      for($y = 1; $y < 16; $y++)
      {
        $rand = mt_rand(1,15);
        Image::create([
          'uuid' => \Str::uuid(),
          'name' => 'gmuer-'.$y.'.jpg',
          'original_name' => 'gmuer-'.$y.'.jpg',
          'extension' => 'jpg',
          'size' => '145623'.$y,
          'order' => $rand,
          'publish' => 1,
          'imageable_type' => Project::class,
          'imageable_id' => $project->id,
        ]);
      }
    }
  }
}