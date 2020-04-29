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
      \App\User::create([
          'name' => 'Administrador',
          'email' => 'admin@admin.com',
          'password' => Hash::make('12345678'),
      ]);
    }
}
