<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Policy
 * @property mixed id
 * @property PolicyType policy_type
 * @property Customer customer
 * @package App\Models
 */
class Policy extends Model
{

    protected $fillable = ['policy_type_id'];
    protected $appends=['total_price'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function items()
    {
        return $this->hasMany('\App\Models\Item');
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

        return $this->items()->sum('price');
    }
}
