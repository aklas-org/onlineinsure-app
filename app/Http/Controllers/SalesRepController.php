<?php

namespace App\Http\Controllers;

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
}
