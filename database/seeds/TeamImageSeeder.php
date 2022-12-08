<?php
namespace Database\Seeders;
use App\Models\Home;
use Illuminate\Database\Seeder;

class TeamImageSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    TeamImage::create([
      'id' => 1
    ]);
  }
}