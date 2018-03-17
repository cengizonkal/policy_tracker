<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed first_name
 * @property mixed last_name
 * @property string email
 * @property mixed phone
 * @property AccountingRecord[] accountingRecords
 * @property Policy[] policies
 */
class Customer extends Model
{
    protected $appends=['balance', 'policy_count','full_name','total_debt','total_credit'];
    public function policies()
    {
        return $this->hasMany('\App\Models\Policy');
    }

    public function items()
    {
        return $this->hasManyThrough('\App\Models\Items', '\App\Models\Policy');
    }

    public function getBalanceAttribute()
    {
        return $this->accountingRecords->sum('credit') - $this->accountingRecords->sum('debt');
    }

    public function getTotalCreditAttribute()
    {
        return $this->accountingRecords->sum('credit');
    }
    public function getTotalDebtAttribute()
    {
        return $this->accountingRecords->sum('debt');
    }


    public function getPolicyCountAttribute()
    {
        return $this->policies->count();
    }
    public function getFullNameAttribute()
    {
        return title_case($this->first_name.' '.$this->last_name);
    }

    public function accountingRecords()
    {
        return $this->hasMany('\App\Models\AccountingRecord');
    }
}
