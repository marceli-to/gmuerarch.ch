<?php
namespace Database\Seeders;
use App\Models\Home;
use Illuminate\Database\Seeder;

class JobImageSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    JobImage::create([
      'id' => 1
    ]);
  }
}