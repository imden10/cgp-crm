<?php

namespace Database\Factories;

use App\Models\Companies;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompaniesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Companies::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'        => $this->faker->company,
            'email'       => $this->faker->unique()->companyEmail,
            'phone'       => $this->faker->phoneNumber,
            'address'     => $this->faker->address,
            'website'     => '',
            'description' => $this->faker->text,
        ];
    }
}
