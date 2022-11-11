<?php
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    $this->call([
      \Database\Seeders\UserSeeder::class,
      \Database\Seeders\TopicSeeder::class,
      \Database\Seeders\CategorySeeder::class,
      \Database\Seeders\DiscourseSeeder::class,
      \Database\Seeders\ProjectSeeder::class,
      \Database\Seeders\JobSeeder::class,
      \Database\Seeders\TeamMemberSeeder::class,
      \Database\Seeders\ImageGridSeeder::class,
    ]);
  }
}
