<?php
namespace Database\Seeders;
use App\Models\Discourse;
use App\Models\DiscourseTopic;
use App\Models\Image;
use Illuminate\Database\Seeder;

class DiscourseSeeder extends Seeder
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
      $discourse = Discourse::create([
        'title' => [
          'de' => $faker->sentence(4, true),
          'en' => $faker->sentence(5, true)
        ],
        'text' => [
          'de' => $faker->realText(200, 2),
          'en' => $faker->realText(150, 3)
        ],
      ]);

      $discourse->flag('isPublish');

      $rand = mt_rand(1,3);
      DiscourseTopic::create([
        'discourse_id' => $discourse->id,
        'topic_id' => $rand
      ]);

      $rand2= mt_rand(1,4);
      Image::create([
        'uuid' => \Str::uuid(),
        'name' => '636ce826efd2'.$rand.'-image-'. $rand . '-3x4.jpg',
        'original_name' => 'image-'. $rand . '-3x4.jpg',
        'extension' => 'jpg',
        'size' => 145623,
        'publish' => 1,
        'imageable_type' => Discourse::class,
        'imageable_id' => $discourse->id,
      ]);
    }
  }
}