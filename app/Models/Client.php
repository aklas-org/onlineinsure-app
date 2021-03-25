<?php

namespace App\Models;

use App\Models\Payroll;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function setAnnualPremiumAttribute($value)
    {
        $this->attributes['annual_premium'] = $value * 100;
    }

    public function getAnnualPremiumCurrencyAttribute()
    {
        return number_format($this->annual_premium / 100, 2);
    }

    public function payrolls()
    {
        return $this->belongsToMany(Payroll::class, 'payroll_clients');
    }
}
