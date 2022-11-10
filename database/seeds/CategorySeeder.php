<?php
namespace Database\Seeders;
use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $data = [
      [
        'title' => [
          'de' => 'Gesundheitsbauten',
          'en' => 'Health buildings',
        ],
        'slug' => [
          'de' => 'gesundheitsbauten',
          'en' => 'health-buildings',
        ],
      ],
      [
        'title' => [
          'de' => 'Öffentliche Bauten',
          'en' => 'Public Buildings',
        ],
        'slug' => [
          'de' => 'offentliche-bauten',
          'en' => 'public-buildings',
        ],
      ],
      [
        'title' => [
          'de' => 'Wohnbauten',
          'en' => 'Residential areas"',
        ],
        'slug' => [
          'de' => 'wohnbauten',
          'en' => 'residential-areas"',
        ],
      ],
    ];
    
    foreach($data as $d)
    {
      Category::create([
        'title' => [
          'de' => $d['title']['de'],
          'en' => $d['title']['en'],
        ],
        'slug' => [
          'de' => $d['slug']['de'],
          'en' => $d['slug']['en'],
        ],
      ]);
    }
  }
}