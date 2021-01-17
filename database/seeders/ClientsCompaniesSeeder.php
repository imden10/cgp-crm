<?php

namespace Database\Seeders;

use App\Models\ClientsCompanies;
use Illuminate\Database\Seeder;

class ClientsCompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ClientsCompanies::factory()->count(10000)->create();
    }
}
