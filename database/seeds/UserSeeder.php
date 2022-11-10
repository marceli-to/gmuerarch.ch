<?php
namespace Database\Seeders;
use App\Models\User;
use App\Models\RoleUser;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $users = [
      [
        'firstname' => 'Marcel',
        'name'  => 'Stadelmann',
        'email' => 'm@marceli.to',
        'email_verified_at' => \Carbon\Carbon::now(),
        'password' => \Hash::make('7aq31rr'),
        'role' => 'admin'
      ],
      [
        'firstname' => 'Reto',
        'name'  => 'Gmür',
        'email' => 'mail@gmuerarch.ch',
        'email_verified_at' => \Carbon\Carbon::now(),
        'password' => \Hash::make('gmu3R4rch'),
      ],
      [
        'firstname' => 'Hans',
        'name'  => 'Grüninger',
        'email' => 'hgruen@bluewin.ch',
        'email_verified_at' => \Carbon\Carbon::now(),
        'password' => \Hash::make('gmu3R4rch'),
        'role' => 'admin'
      ]
    ];

    foreach($users as $user)
    {
      User::create([
        'firstname' => $user['firstname'],
        'name'  => $user['name'],
        'email' => $user['email'],
        'email_verified_at' => $user['email_verified_at'],
        'password' => $user['password'],
        'role' => 'admin'
      ]);

    }
  }
}
