<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SalesRepResource;
use App\Models\SalesRep;
use Illuminate\Http\Request;

class SalesRepController extends Controller
{
    public function index()
    {
        $salesReps = SalesRep::oldest('name')->get();

        return SalesRepResource::collection($salesReps);
    }
}
