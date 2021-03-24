<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function show(Payroll $payroll)
    {
        return view('pdfs.show', compact('payroll'));
    }
}
