<?php

namespace Database\Factories;

use App\Models\Clients;
use App\Models\Companies;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Clients::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'firstname'  => $this->faker->firstName,
            'lastname'   => $this->faker->lastName,
            'middlename' => '',
            'email'      => $this->faker->unique()->email,
            'phone'      => $this->faker->phoneNumber,
            'address'    => $this->faker->address,
            'company_id' => Companies::factory()
        ];
    }
}
