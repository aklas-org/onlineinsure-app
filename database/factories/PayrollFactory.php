<?php

namespace Database\Factories;

use App\Models\Payroll;
use App\Models\SalesRep;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

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
        $date = $this->faker->dateTime;

        $date = Carbon::parse($date);

        $dateStart = $date->startOfWeek()->format('Y-m-d');
        $dateEnd = $date->endOfWeek()->format('Y-m-d');

        return [
            'sales_rep_id' => SalesRep::factory(),
            'period' => $dateStart . ' - ' . $dateEnd,
            'bonus' => $this->faker->numberBetween(100, 1000),
            'commission' => $this->faker->numberBetween(1000, 10000),
        ];
    }
}
