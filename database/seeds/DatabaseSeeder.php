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
        $this->call(EstadoSeeder::class);
        $this->call(CidadeSeeder::class);
        $this->call(EnderecoSeeder::class);
        $this->call(UsersSeed::class);
    }
}
