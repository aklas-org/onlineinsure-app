<?php

namespace App\Models;

use App\Models\Payroll;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesRep extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function payrolls()
    {
        return $this->hasMany(Payroll::class);
    }
}
