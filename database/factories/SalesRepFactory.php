<?php

namespace Database\Factories;

use App\Models\SalesRep;
use Illuminate\Database\Eloquent\Factories\Factory;

class SalesRepFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SalesRep::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'commission_percentage' => $this->faker->numberBetween(1, 100),
            'tax_rate' => $this->faker->numberBetween(1, 100),
            'address' => $this->faker->address,
        ];
    }
}
