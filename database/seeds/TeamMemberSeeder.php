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
    TeamMember::create([
      'firstname' => 'Silvia',
      'name' => 'Gmür',
      'title' => [
        'de' => 'Dipl. Architektin',
        'en' => 'Dipl. Architektin'
      ],
      'description' => [
        'de' => 'Gründungsmitglied',
        'en' => 'Gründungsmitglied',
      ],
    ]);

    TeamMember::create([
      'firstname' => 'Reto',
      'name' => 'Gmür',
      'title' => [
        'de' => 'Dipl. Architekt BSA SIA EPFL',
        'en' => 'Dipl. Architekt BSA SIA EPFL'
      ],
      'description' => [
        'de' => 'Geschäftsleiter',
        'en' => 'Geschäftsleiter',
      ],
    ]);

    TeamMember::create([
      'firstname' => 'Linda',
      'name' => 'Gmür',
      'title' => [
        'de' => 'Dipl.-Ing. Architektin BUW',
        'en' => 'Dipl.-Ing. Architektin BUW'
      ],
      'description' => [
        'de' => '',
        'en' => '',
      ],
    ]);

    TeamMember::create([
      'firstname' => 'Kresimir',
      'name' => 'Franciskovic',
      'title' => [
        'de' => 'Dipl.-Ing. Architekt FH',
        'en' => 'Dipl.-Ing. Architekt FH'
      ],
      'description' => [
        'de' => '',
        'en' => '',
      ],
    ]);

    TeamMember::create([
      'firstname' => 'Sihem',
      'name' => 'Hadjri',
      'title' => [
        'de' => 'Sekretariat',
        'en' => 'Sekretariat'
      ],
      'description' => [
        'de' => '',
        'en' => '',
      ],
    ]);
  }
}
