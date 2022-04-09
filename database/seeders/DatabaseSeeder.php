<?php

use App\Models\Grupo;
use App\Models\Usuario;
namespace Database\Seeders;

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
        \App\Models\User::factory(10)->create();
        // \App\Models\Grupo::factory(5)->hasPostagems(8)->create();
        // \App\Models\Usuario::factory(4)->hasPostagems(8)->create();
    }
}
