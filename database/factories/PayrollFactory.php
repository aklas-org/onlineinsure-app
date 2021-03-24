<?php

namespace Database\Factories;

use App\Models\Payroll;
use App\Models\SalesRep;
use Illuminate\Database\Eloquent\Factories\Factory;

class PayrollFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Payroll::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sales_rep_id' => SalesRep::factory(),
            'period' => $this->faker->date,
            'bonus' => $this->faker->numberBetween(100, 1000),
            'commission' => $this->faker->numberBetween(1000, 10000),
        ];
    }
}
