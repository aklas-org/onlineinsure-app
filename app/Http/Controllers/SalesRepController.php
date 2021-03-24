<?php

namespace App\Http\Controllers;

use App\Actions\SalesRep\CreateSalesRep;
use App\Models\SalesRep;
use Illuminate\Http\Request;

class SalesRepController extends Controller
{
    public function index()
    {
        abort('403', 'This feature is not included in the instruction.');
    }

    public function create()
    {
        return view('sales-reps.create');
    }

    public function store(CreateSalesRep $action)
    {
        $action->create(request()->input());

        return redirect(route('sales-reps.create'))->with('success', 'Sales Rep has been added.');
    }
}
