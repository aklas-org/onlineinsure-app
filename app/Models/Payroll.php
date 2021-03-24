<?php

namespace App\Models;

use App\Models\Client;
use App\Models\SalesRep;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    use HasFactory;

    public function setBonusAttribute($value)
    {
        $this->attributes['bonus'] = $value * 100;
    }

    public function setCommissionAttribute($value)
    {
        $this->attributes['commission'] = $value * 100;
    }

    public function getBonusCurrencyAttribute()
    {
        return number_format($this->bonus / 100, 2);
    }

    public function getCommissionCurrencyAttribute()
    {
        return number_format($this->commission / 100, 2);
    }

    public function salesRep()
    {
        return $this->belongsTo(SalesRep::class);
    }

    public function clients()
    {
        return $this->belongsToMany(Client::class, 'payroll_clients');
    }
}
