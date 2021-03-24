<?php

namespace App\Actions\Payroll;

use App\Models\Payroll;
use Illuminate\Support\Facades\Validator;

class CreatePayroll
{
    public function create($input)
    {
        $data = Validator::make($input, [
            'sales_rep_id' => ['required', 'exists:sales_reps,id'],
            'period' => ['required', 'date_format:Y-m-d'],
            'bonus' => ['required', 'numeric'],
            'commission' => ['required', 'numeric'],
            'client_id.*' => ['required', 'exists:clients,id'],
        ], [], [
            'sales_rep_id' => 'Sales Rep',
            'period' => 'Period',
            'bonus' => 'Bonus',
            'commission' => 'Commission',
            'client_id.*' => 'Client',
        ])->validate();

        $payroll = Payroll::create(collect($data)->except('client_id')->all());

        $payroll->clients()->sync($data['client_id']);

        $payroll->load(['clients']);

        return $payroll;
    }
}
