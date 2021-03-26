<?php

namespace App\Actions\Payroll;

use App\Jobs\SendPayrollEmailToClients;
use App\Models\Payroll;
use Illuminate\Support\Facades\Validator;

class CreatePayroll
{
    public function create($input)
    {
        $data = Validator::make($input, [
            'sales_rep_id' => ['required', 'exists:sales_reps,id'],
            'period' => ['required', function ($attribute, $value, $fail) {
                $dates = explode(' - ', $value);

                if (2 != count($dates)) {
                    $fail('The ' . $attribute . ' is invalid.');
                }

                if (! (strtotime($dates[0]) && strtotime($dates[1]))) {
                    $fail('The ' . $attribute . ' is invalid.');
                }
            }],
            'bonus' => ['required', 'numeric'],
            'commission' => ['required', 'numeric'],
            'client_id' => ['required', 'array'],
            'client_id.*' => ['required', 'exists:clients,id'],
        ], [
            'client_id.array' => 'The Number of Clients field is required.',
        ], [
            'sales_rep_id' => 'Sales Rep',
            'period' => 'Period',
            'bonus' => 'Bonus',
            'commission' => 'Commission',
            'client_id' => 'Number of Clients',
            'client_id.*' => 'Client',
        ])->validate();

        $payroll = Payroll::create(collect($data)->except('client_id')->all());

        $payroll->clients()->sync($data['client_id']);

        $payroll->load(['clients']);

        SendPayrollEmailToClients::dispatch($payroll);

        return $payroll;
    }
}
