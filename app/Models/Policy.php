<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Policy
 * @property mixed id
 * @property Customer customer
 * @property PolicyType policyType
 * @property array features
 * @property mixed price
 * @property mixed start_at
 * @property mixed valid_until
 * @property mixed customer_id
 * @property int policy_company_id
 * @property mixed discount
 * @property string description
 * @property int is_accountable
 * @package App\Models
 */
class Policy extends Model
{
    use SoftDeletes;
    protected $fillable = ['policy_type_id'];
    protected $appends = ['total_price'];
    protected $dates = ['valid_until', 'start_at'];
    protected $casts = ['features' => 'array'];

    public function policyCompany()
    {
        return $this->belongsTo('\App\Models\PolicyCompany');
    }

    public function policyType()
    {
        return $this->belongsTo('\App\Models\PolicyType');
    }

    public function customer()
    {
        return $this->belongsTo('\App\Models\Customer');
    }

    public function getTotalPriceAttribute()
    {
        return $this->price;
    }

    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format('d-m-Y'); // Use your own format here
    }

    public function followups()
    {
        return $this->hasMany('\App\Models\Followup');
    }

    public function scopeActive($query)
    {
        return $query->where('valid_until', '>', Carbon::today()->startOfDay());
    }

    public function scopeMonthly($query)
    {
        return $query->where('start_at', '>', Carbon::today()->startOfMonth()->startOfDay())
            ->where('start_at', '<', Carbon::today()->endOfMonth()->endOfDay());
    }

    public function scopeAccountable($query)
    {
        return $query->where('is_accountable', 1);
    }


}
