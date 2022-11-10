<?php
namespace Database\Seeders;
use App\Models\Topic;
use Illuminate\Database\Seeder;

class TopicSeeder extends Seeder
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
          'de' => 'Publikationen',
          'en' => 'Publications',
        ],
        'slug' => [
          'de' => 'publikationen',
          'en' => 'publications',
        ],
      ],
      [
        'title' => [
          'de' => 'Recherche',
          'en' => 'Research',
        ],
        'slug' => [
          'de' => 'recherche',
          'en' => 'research',
        ],
      ],
      [
        'title' => [
          'de' => 'Auszeichnungen',
          'en' => 'Awards',
        ],
        'slug' => [
          'de' => 'auszeichnungen',
          'en' => 'awards',
        ],
      ],
    ];
    
    foreach($data as $d)
    {
      Topic::create([
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