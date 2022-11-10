<?php
namespace Database\Seeders;
use App\Models\TeamMember;
use Illuminate\Database\Seeder;
use Faker\Generator;

class TeamMemberSeeder extends Seeder
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
      TeamMember::create([
        'firstname' => $faker->firstName,
        'name' => $faker->lastName,
        'title' => [
          'de' => $faker->jobTitle,
          'en' => $faker->jobTitle
        ],
        'description' => [
          'de' => $faker->catchPhrase,
          'en' => $faker->catchPhrase,
        ],
      ]);
    }
  }
}
