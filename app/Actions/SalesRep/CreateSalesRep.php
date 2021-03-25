<?php

namespace App\Actions\SalesRep;

use App\Models\SalesRep;
use Illuminate\Support\Facades\Validator;

class CreateSalesRep
{
    public function create($input)
    {
        $data = Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'commission_percentage' => ['required', 'integer', 'min:1', 'max:100'],
            'tax_rate' => ['required', 'integer', 'min:1', 'max:100'],
            'address' => ['required', 'string'],
        ], [], [
            'name' => 'Name',
            'commission_percentage' => 'Commission Percentage',
            'tax_rate' => 'Tax Rate',
            'address' => 'Address',
        ])->validate();

        return SalesRep::create($data);
    }
}
