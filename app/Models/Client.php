<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getAnnualPremiumCurrencyAttribute()
    {
        return number_format($this->annual_premium / 100, 2);
    }

    public function setAnnualPremiumAttribute($value)
    {
        $this->attributes['annual_premium'] = $value * 100;
    }
}
