<?php
namespace Database\Seeders;
use App\Models\ProjectImage;
use Illuminate\Database\Seeder;

class ProjectImageSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    ProjectImage::create([
      'id' => 1
    ]);
  }
}