<?php
namespace Database\Seeders;
use App\Models\Job;
use App\Models\File;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
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
      $job = Job::create([
        'title' => [
          'de' => $faker->sentence(4, true),
          'en' => $faker->sentence(5, true)
        ],
        'text' => [
          'de' => $faker->realText(200, 2),
          'en' => $faker->realText(150, 3)
        ],
      ]);

      $job->flag('isPublish');

      $rand = mt_rand(1,3);
      File::create([
        'uuid' => \Str::uuid(),
        'name' => '636ce826efd1'.$rand.'_jobinserat-'. $rand . '.pdf',
        'original_name' => 'jobinserat-'. $rand . '.pdf',
        'extension' => 'pdf',
        'size' => 145623,
        'publish' => 1,
        'fileable_type' => Job::class,
        'fileable_id' => $job->id,
      ]);

    }
  }
}