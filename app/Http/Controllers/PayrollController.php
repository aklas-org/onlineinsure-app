<?php

namespace App\Http\Controllers;

use App\Actions\Payroll\CreatePayroll;
use Illuminate\Http\Request;

class PayrollController extends Controller
{
    public function create()
    {
        return view('payroll.create');
    }

    public function store(CreatePayroll $action)
    {
        $payroll = $action->create(request()->input());

        return redirect(route('pdfs.show', ['payroll' => $payroll->id]));
    }
}
