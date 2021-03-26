<?php

namespace App\Models;

use App\Models\Client;
use App\Models\SalesRep;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Payroll extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function setBonusAttribute($value)
    {
        $this->attributes['bonus'] = $value * 100;
    }

    public function setCommissionAttribute($value)
    {
        $this->attributes['commission'] = $value * 100;
    }

    public function getCreditTotalAttribute()
    {
        return $this->commission + $this->bonus;
    }

    public function getPeriodStartAttribute()
    {
        return Carbon::parse(explode(' - ', $this->period)[0]);
    }

    public function getSalesRepCommissionAttribute()
    {
        return $this->credit_total * ($this->salesRep->commission_percentage / 100);
    }

    public function getSalesRepTaxAttribute()
    {
        return $this->sales_rep_commission * ($this->salesRep->tax_rate / 100);
    }

    public function getSalesRepPaymentAmountAttribute()
    {
        return $this->sales_rep_commission - $this->sales_rep_tax;
    }

    public function getPeriodEndAttribute()
    {
        return Carbon::parse(explode(' - ', $this->period)[0]);
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
