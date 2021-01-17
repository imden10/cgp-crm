<?php

namespace Database\Factories;

use App\Models\Clients;
use App\Models\Companies;
use App\Models\ClientsCompanies;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientCompaniesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ClientsCompanies::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'clients_id'   => Clients::factory(),
            'companies_id' => Companies::factory()
        ];
    }
}
